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
        $title = '浏览分类';
        $keyword = $request -> input('keyword','');
        $data = Categorys::where('name','like','%'. $keyword .'%')->get();
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
        return view('admin.category.create',['title'=>$title]);
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
                'name.required' => '用户名不能为空',
                'name.min' => '用户名最少2位',
                'name.max' => '用户名最多8位'
            ]);
        $input = $request->except('_token');

        $cate = new Categorys;
        $cate->name = $input['name'];
        $cate->pid = 0;
        $cate->path = '0,';
        $res = $cate->save();

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
