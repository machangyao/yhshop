<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;
use App\Http\Models\Home\Addr;
use App\Http\Models\Home\citys;
class UserAddrController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        //返回收货地址页面 马长遥
        $addr = Addr::where('user_id',session('user_info')['id'])->get();
        $sheng = citys::where('LevelType',1)->get();
        $shi = citys::where('LevelType',2)->first();
        $qu = citys::where('ParentId',110100)->get();
        return view('home.user.address',compact('addr','sheng','shi','qu'));

    }

    public function ajax(Request $request){
        //执行删除地址 马长遥
        $dat = $request->input('val');
        $data['shi'] = citys::where('ParentId',$dat)->get();
        $first = citys::where('ParentId',$dat)->first();
        $data['qu'] = citys::where('ParentId',$first['id'])->get();
        return $data;

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        //增加新的地址 马长遥
        $this->validate($request, [
            'addr_name' => 'required|',
            'addr_tel' => 'required|',
            'addrdetail' => 'required|',
        ],$messages = [
            'addr_name.required'     => '收货人不能为空',
            'addr_tel.required'      => '收货电话不能为空',
            'addrdetail.required'      => '收货详细地址不能为空',
        ]);
        $id = session('user_info')['id'];
        $data = $request->except('_token','_method');
        $addr = citys::where('id',$data['qu'])->first();
        $addr = $addr['MergerName'];
        unset($data['qu']);
        $data['user_id'] = $id;
        $data['addr'] = $addr;
        $res = Addr::insert($data);
        if($res){
            return back();
        }else{
            return back();

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

        //返回修改地址 马长遥
        $addr = Addr::find($id);
        $sheng = citys::where('LevelType',1)->get();
        $shi = citys::where('LevelType',2)->first();
        $qu = citys::where('ParentId',110100)->get();
        return view('home.user.editaddr',compact('addr','sheng','shi','qu'));

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

        //执行修改地址 马长遥
        $data = $request->except('_token','_method','qu');
        $city = citys::find($request->input('qu'));
        $data['addr'] = $city->MergerName;
        $res = Addr::where('id',$id)->update($data);
        if($res){
            return redirect('/user/addr');
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

        //删除地址 马长遥
        $res = Addr::where('id',$id)->where('addr_status',1)->first();
        if($res){
            return back();
        }
        $res = Addr::where('id',$id)->delete();
        if($res){
            return back();
        }else{
            return back();

        }
    }

    public function daddr(Request $request){
        $id = $request->input('id');

        $res = Addr::where('addr_status',1)->first();
        if($res){
            Addr::where('addr_status',1)->update(['addr_status'=> 0]);
        }

        Addr::where('id',$id)->update(['addr_status'=>1]);


    }
}