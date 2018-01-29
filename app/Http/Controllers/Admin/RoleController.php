<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Models\Admin\Role;
use App\Http\Models\Admin\Permission;
use DB;

class RoleController extends Controller
{
     //返回角色授权页面
    public function auth($id)
    {
        //根据id找到相关的用户
        $role = Role::find($id);
        //获取权限列表
        $pers = Permission::get();
        //获取当前角色已经拥有的权限列表
        $own_pers = $role ->permission;
        // dd($own_pers);
        //存放当前角色拥有的权限ID
        $own = [];
        foreach($own_pers as $v)
        {
            $own[] = $v -> id;
        }
        return view('admin.role.auth',compact('role','pers','own'));
    }
    //处理用户授权操作
    public function doAuth(Request $request)
    {
        //1.获取传过来的参数(要授权的用户的ID,要授予的角色的ID)
        $input = $request -> except('_token');
        // dd($input);
        //2.提交到user_roles这个表中
        DB::beginTransaction();
        try{
            //删除当前角色的所有权限
            // dd($input['permission_id']);
            DB::table('permission_roles') -> where('roles_id', $input['id']) -> delete();
            if(!empty($input['permission_id'])){
                //关联表中记录（给角色授权）前，应该检查一下，当前角色是否已经拥有了此权限，如果没有再添加
                foreach($input['permission_id'] as $v){
                    DB::table('permission_roles') -> insert(
                            ['roles_id' => $input['id'], 'permission_id' => $v]
                        );
                }
            }
            DB::commit();
            return redirect('admin/role/auth/'.$input['id']);
        }catch(Exception $e){
            DB::rollBack();
            return redirect() -> back() -> withErrors(['error' => $e->getMessage()]);
        }
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $role = Role::get();
        return view('admin.role.list',compact('role'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.role.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $input = $request -> except('_token');
        $res = Role::create($input);

        // dd($res); 
        if($res){
            return redirect('admin/role')->with('msg','添加成功');
        }else{
            return back()->with('msg','添加失败');
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
        $role = Role::find($id);
        return view('admin.role.edit',compact('role'));
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
        $input = $request -> except('_token','_method');
        // dd($input);
        $res = Role:: where('id',$id) -> update($input);

        if($res){
            return redirect('admin/role');
        }else{
            return back()->with('msg','修改失败');
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
        // return('11');
       $res = Role::find($id) -> delete();
       // $res = Role::find($id);
       // dd($res);
        if($res){
            $data = [
                'status' => 0,
                'message' => '删除成功'
            ];
        }else{

            $data = [
                'status' => 1,
                'message' => '删除失败'
            ];
        }
            return $data;
    }
}
