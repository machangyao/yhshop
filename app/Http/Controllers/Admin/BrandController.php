<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

<<<<<<< HEAD:app/Http/Controllers/UserController.php
use DB;
class UserController extends Controller
=======
use App\Http\Models\Admin\Brands;

class BrandController extends Controller
>>>>>>> master:app/Http/Controllers/Admin/BrandController.php
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
<<<<<<< HEAD:app/Http/Controllers/UserController.php
        //首页
         $data = \DB::table('users')->get();
        return view('index', ['data'=>$data]);
=======
        //
        $title = "品牌列表";
        $data = Brands::all();
        return view('admin.brand.index',['title'=>$title,'data'=>$data]);
>>>>>>> master:app/Http/Controllers/Admin/BrandController.php
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
<<<<<<< HEAD:app/Http/Controllers/UserController.php
        //添加
        return view('add');
=======
        //
        $title = "添加品牌";
        return view('admin.brand.create',['title'=>$title]);
>>>>>>> master:app/Http/Controllers/Admin/BrandController.php
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
<<<<<<< HEAD:app/Http/Controllers/UserController.php
        $data = $request->except('_token');
        $res = \DB::table('users')->insert([[ 'name'=>$data['name'],'password'=>$data['password'] ]]);
        if($res){
            return redirect('/user');

=======
        $input = $request->except('_token');
        $data = new Brands;
        $data -> name = $input['name'];
        $data -> url = $input['url'];
        $res = $data -> save();
        if($res)
        {
            return redirect('/brand')->with('info','添加成功');
>>>>>>> master:app/Http/Controllers/Admin/BrandController.php
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
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
