<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Http\Models\Admin\Brands;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //首页
         $data = \DB::table('users')->get();
        return view('index', ['data'=>$data]);
        //
        $title = "品牌列表";
        $data = Brands::all();
        return view('admin.brand.index',['title'=>$title,'data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //添加
        return view('add');
        //
        $title = "添加品牌";
        return view('admin.brand.create',['title'=>$title]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $data = $request->except('_token');
        $res = \DB::table('users')->insert([[ 'name'=>$data['name'],'password'=>$data['password'] ]]);
        if($res){
            return redirect('/user');
        $input = $request->except('_token');
        $data = new Brands;
        $data -> name = $input['name'];
        $data -> url = $input['url'];
        $res = $data -> save();
        if($res)
        {
            return redirect('/brand')->with('info','添加成功');
        }else{
            return back()->with('info','添加失败');
        }   

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
        $title = '修改品牌';
        $data = Brands::find($id);
        return view('admin.brand.edit',['title'=>$title,'data'=>$data]);
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
        $input = $request->except('_token','_method');
        $data = Brands::find($id);
        $res = $data->update($input);
        if($res)
        {
            return redirect('brand/')->with('info','修改成功');
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
        //删除
        $res = Brands::find($id)->delete();
        if($res)
        {
            $data = [
                'status'=>1,
                'message'=>'删除成功'
            ];
        }else{
            $data = [
                'status'=>0,
                'message'=>'删除失败'
            ];
        }

        return $data;
    }
}
