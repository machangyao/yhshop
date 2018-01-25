<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Models\Admin\Articles;
class ArticleController extends Controller
{
    /**
     * -------------文章
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //显示文章列表
        $article = Articles::orderBy('article_id','asc')
            ->where(function($query) use($request){

                $username = $request->input('keywords1');
                if(!empty($username)) {
                    $query->where('article_author','like','%'.$username.'%');
                }
                $title = $request->input('keywords2');
                if(!empty($title)){
                    $query->where('article_title','like','%'.$title.'%');
                }
            })
            ->paginate($request->input('num', 5));
        return view('admin/article/index',['article'=>$article, 'request'=> $request]);        
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    //返回添加页面
    public function create()
    {
        return view('admin/article/add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    //执行添加
    public function store(Request $request)
    {
        //获取数据
        $input = $request->except('_token');

        // 请求中是否携带上传图片
        if($request->file('article_img')){
           //获取上传图片文件
            $file = $request->file('article_img');
            // 判断上传文件的有效性
            if($file->isValid()) {
                $entension = $file->getClientOriginalExtension();//上传文件的后缀名
                // 生成新的文件名
                $newName = date('YmdHis') . mt_rand(1000, 9999) . '.' . $entension;
                // 将文件移动到指定位置
                $path = $file->move(public_path().'/uploads',$newName);
                // 返回上传文件图片  显示到浏览器上面
                $url ='/uploads/'.$newName;
                // 把所保存的图片位置放入到字段中去
                $input['article_img'] = $url;
            }
        }

        //验证数据
        $rule = [
            'article_author'=>'required',
            'article_title'=>'required',
            'article_content'=>'required',
        ];

        //提示信息
        $mess = [
            'article_author.required'=>'作者不能为空',
            'article_title.required'=>'标题不能为空',
            'article_content.required'=>'内容不能为空',
        ];

        $Validator = Validator::make($input, $rule, $mess);

        if($Validator->fails()){
            return redirect('admin/article/create')
                ->withErrors($Validator)
                ->withInput(); 
        }



        //添加操作
        $res = Articles::create($input);
        //判断是否添加成功
        if($res){
            //如果添加成功
            return redirect('admin/article');
        }else{
            //如果添加失败，返回到添加页
            return back();
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //查看内容
    public function show($id)
    {
        //获取该条数据
        $data = Articles::find($id);
        
        return $data;
    }

    /**
     * 编辑
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //编辑（返回编辑页面）
    public function edit($id)
    {
        //根据id获取要修改的数据
        $article = Articles::find($id);

        return view('admin/article/edit',compact('article'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //执行编辑
    public function update(Request $request, $id)
    {
        //获取传来的数据
        $input = $request->except('_token');

        //验证数据
        $rule = [
            'article_author'=>'required',
            'article_title'=>'required',
            'article_content'=>'required',
        ];

        //提示信息
        $mess = [
            'article_author.required'=>'作者不能为空',
            'article_title.required'=>'文章标题不能为空',
            'article_content.required'=>'文章内容不能为空',
        ];

        //获取该条数据
        $article = Articles::find($id);

        //修改
        $res = $article->update($input);

        //判断
        if($res){
            return redirect('admin/article');
        }else{
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //删除
    public function destroy($id)
    {
        //删除
        $res = Articles::find($id)->delete();
        //判断
        if($res){
            $data = [
                'status'=>0,
                'message'=>'删除成功'
            ];
        }else{
            $data = [
                'status'=>1,
                'message'=>'删除失败'
            ];
        }

        return $data;
    }
}
