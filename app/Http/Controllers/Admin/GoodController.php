<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Models\Admin\Goods;
use App\Http\Models\Admin\Categorys;

use Intervention\Image\ImageManagerStatic as Image;

class GoodController extends Controller
{

    /*
    * 商品上下架
    * @author taidmin
    * @return 返回上下架成功后状态
    */
    public function jia($id)
    {
        $data = Goods::find($id);
        if($data->status == 1){
            $data->status = 0;
        }elseif($data->status == 0){
            $data->status = 1;
        }

        $res = $data->save();
        if($res)
        {
            $data = ['status' => 1,'message'=>'成功'];
        }else{
            $data = ['status' => 0,'message'=>'失败'];
        }

        return $data;
    }

    /*
    * 图片上传
    * @author taidmin
    * @return 返回文件路径
    */
    public function upload()
    {
        //获取上传的文件对象
        $file = Goods::file('file_upload');
        //判断文件是否有效
        if($file->isValid()){
            $entension = $file->getClientOriginalExtension();//上传文件的后缀名
            $newName = date('YmdHis').mt_rand(1000,9999).'.'.$entension;
            $path = $file->move(base_path().'/uploads',$newName);
            $filepath = 'uploads/'.$newName;
            //返回文件的路径
            return  $filepath;
        }
    }


    /*
    * 商品列表
    * @author taidmin
    * @return 返回商品列表视图
    */
    public function index(Request $request)
    {
        //
        $title = "商品列表";
        $keyword = $request->input('keyword','');

        $num = $request->input('num',6);

        //取商品分类信息
        $catess = new categorys;
        $data = Goods::where('name','like','%' .$keyword. '%')->with('categorys','brands')->paginate($num);
        return view('admin.good.index',['title'=>$title,'data'=>$data,'where'=>['keyword'=>$keyword,'num'=>$num]]);
    }


    /*
    * 添加商品
    * @author taidmin
    * @return 返回添加商品视图
    */
    public function create()
    {
        //
        $title = "添加商品";
        $cates = \DB::select("select *,concat(path,id,',') path from categorys order by path");
        $brands = \DB::table("brands")->get();


        //从分类数组中取出pid列
        $pid = array_column($cates,'pid');
        //去除重复
        $pid = array_unique($pid);
        
        return view('admin.good.create',['title'=>$title,'cates'=>$cates,'brands'=>$brands,'pid'=>$pid]);

    }

    /*
    * 执行添加商品
    * @author taidmin
    * @return 返回添加后的状态
    */
    public function store(Request $request)
    {
        $this->validate($request, [
                'name' => 'required|min:2',
                'price' => 'required|numeric',
                'market_price' => 'required|numeric',
                'number' => 'required|numeric',

                'content' => 'required',

            ], [
                'name.required' => '商品名称不能为空',
                'name.min' => '商品名称最少两位',
                'price.required' => '商品价格不能为空',
                'price.numeric' => '商品价格必须是数字',
                'market_price.required' => '市场价格不能为空',
                'market_price.numeric' => '市场价格必须是数字',
                'number.required' => '库存不能为空',

                'number.numeric' => '库存必须是数字',
                'content.required' => '商品详情不能为空'

            ]);
        // 获取提交的数据
        $input = $request->except('_token');
        // 添加到商品数据库
        $data = new Goods;
        $data->cid = $input['id'];
        $data->name = $input['name'];
        $data->price = $input['price'];
        $data->market_price = $input['market_price'];
        $data->bid = $input['bid'];
        $data->sn = $input['sn'];
        $data->number = $input['number'];


        $data->keyword = $input['keyword'];
        $data->description = $input['description'];
        $data->desc = $input['content'];


        //判断是否上传文件
        if($request->hasFile('pic'))
        {
            //判断是否上传成功
            $file = $request->file('pic');
            if($file->isValid())
            {
                //获取文件扩展名
                $ext = $file->getClientOriginalExtension();
                $filename = time().mt_rand(100000,999999).'.'.$ext;
                $res = $file->move('./uploads',$filename);
                //图片缩放
                $img = Image::make("./uploads/".$filename)->resize(218,218);
                $img->save("./uploads/s_".$filename);
                if($res)
                {
                    $data->pic = $filename;
                }else{
                    $data->pic = 'default.jpg';
                }
            }else{
                $data->pic = 'default.jpg';
            }
        }else{
            $data->pic = 'default.jpg';
        }


        $res = $data->save();
        if($res)
        {
            return redirect('good/')->with('info','商品添加成功');
        }else{
            return back()->with('info','商品添加失败');
        }

    }

    /*
    * 商品详情页
    * @author taidmin
    * @return 返回商品详情页视图
    */
    public function show($id)
    {
        //
        $title = '商品详情页';
        $data = Goods::find($id);
        return view('admin.good.show',['title'=>$title,'data'=>$data]);
    }

    /*
    * 修改商品
    * @author taidmin
    * @return 返回修改商品视图
    */
    public function edit($id)
    {
        //
        //获取分类cid
        $cid = $_GET['cid'];
        //获取品牌bid
        $bid = $_GET['bid'];
        $title = '修改商品';
        $data = Goods::find($id);
        $cates = \DB::select("select *,concat(path,id,',') path from categorys order by path");
        $brands = \DB::table("brands")->get();


        //从分类数组中取出一列pid
        $pid = array_column($cates,'pid');
        //去除重复
        $pid = array_unique($pid);

        return view('admin.good.edit',['title'=>$title,'cates'=>$cates,'brands'=>$brands,'data'=>$data,'cid'=>$cid,'bid'=>$bid,'pid'=>$pid]);

    }

    /*
    * 执行修改商品
    * @author taidmin
    * @return 返回修改后状态
    */
    public function update(Request $request, $id)
    {
        //
        $input = $request->except('_token');
        $data = Goods::find($id);

        $data->name = $input['name'];
        $data->sn = $input['sn'];
        $data->price = $input['price'];
        $data->market_price = $input['market_price'];
        $data->cid = $input['cid'];
        $data->bid = $input['bid'];
        $data->number = $input['number'];
        $data->keyword = $input['keyword'];
        $data->description = $input['description'];
        $data->desc = $input['content'];


        //判断是否上传文件,如果没有上传,则显示原来的
        if($request->hasFile('pic'))
        {
            //判断是否上传成功
            $file = $request->file('pic');
            if($file->isValid())
            {
                //获取文件扩展名
                $ext = $file->getClientOriginalExtension();
                $filename = time().mt_rand(100000,999999).'.'.$ext;
                $res = $file->move('./uploads',$filename);
                //图片缩放
                $img = Image::make("./uploads/".$filename)->resize(218,218);
                $img->save("./uploads/s_".$filename);
                if($res)
                {
                    $data->pic = $filename;
                }
            }
        }


        $res = $data->save();
        
        if($res)
        {
            return redirect('good/')->with('info','修改成功');
        }else{
            return back()->with('info','修改失败');
        }
        
    }

    /*
    * 删除商品
    * @author taidmin
    * @return 返回删除后状态
    */
    public function destroy($id)
    {
        //
        $res = Goods::find($id)->delete();
        if($res)
        {
            $data = [
                'status' => 1,
                'message' => '删除成功'
            ];
        }else{
            $data = [
                'status' => 0,
                'message' => '删除失败'
            ];
        }

        return $data;
    }
}
