<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Models\Admin\Categorys;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $title = '分类列表';
        $keyword = $request -> input('keyword','');
        // $data = Categorys::where('name','like','%'. $keyword .'%')->orderBy("concat(path,id,',')",'asc')->get();
        if($keyword)
        {
            $data = \DB::select("select *,concat(path,id,',') path from categorys where name like '{$keyword}' order by path");
        }else{
            $data = \DB::select("select *,concat(path,id,',') path from categorys  order by path");
        }
        
        // $data = Categorys::where('name','like','%'. $keyword .'%')->orderBy('path','asc')->orderBy('id','asc')->get();
        return view('admin.category.index',['title'=>$title,'data'=>$data,'where'=>['keyword'=>$keyword]]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = '添加分类';
        $id = $_GET['id'];
        // $cates = Categorys::get();
        $cates =  \DB::select("select *,concat(path,id,',') path from categorys  order by path");

        return view('admin.category.create',['title'=>$title,'cates'=>$cates,'id'=>$id]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
                'name' => 'required|min:2|max:8'
            ], [
                'name.required' => '分类名称不能为空',
                'name.min' => '分类名称最少2位',
                'name.max' => '分类名称最多8位'
            ]);
        $input = $request->except('_token');

        $data = new Categorys;
        $data->name = $input['name'];
        $data->pid = $input['pid'];
        if($data->pid == '0'){
            $data->path = '0,';
        }else{
            //取出父类的所有信息，其中肯定有父类的path路径
            $cate = Categorys::where('id',$data->pid)->first();
            $data->path = $cate->path.$data->pid.',';
        }
        
        $res = $data->save();

        if($res)
        {
            return redirect('category/')->with('info','添加成功');
        }else{
            return back()->with('info','添加失败');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $title = '修改分类';
        $data = Categorys::where('id',$id)->first();
        return view('admin.category.edit',['title'=>$title,'data'=>$data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $input = $request->only('name');
        $data = Categorys::find($id);
        $data->name = $input['name'];
        $res = $data->save();
        if($res)
        {
            return redirect('category/')->with('info','修改成功');
        }else{
            return back()->with('info','修改失败');
        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $res = Categorys::find($id)->delete();
        if($res)
        {
            return response()->json(['status'=>1]);
        }else{
            return response()->json(['stauts'=>0]);
        }
    }
}
