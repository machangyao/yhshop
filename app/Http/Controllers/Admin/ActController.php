<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Models\Admin\Activity;
use Illuminate\Support\Facades\Validator;

class ActController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $act = activity::orderBy('aid','asc')
        ->where(function($query) use($request){
            $username = $request->input('keywords');
            if(!empty($username)) {
                $query->where('act_type','like','%'.$username.'%');
            }
        })
        ->paginate($request->input('num', 3));
        return view('admin/activity/activity',[ 'request'=> $request,'act'=>$act]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('admin/activity/add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        dd($request);
        $input = $request->except('_token');
        if($request->file('act_image')){
            $file = $request->file('act_image');
            if($file->isValid()){
                $entension = $file->getClientOriginalExtension();
                $newName = date('YmdHis').mt_rand(1000,9999).'.'.$entension;
                $path = $file->move(public_path().'/uploads',$newName);
                $url = '/uploads/'.$newName;
                $input['act_image'] = $url;
            }
        }
//        dd($input);
//        $Validator   = Validator::make($input);
        $res = Activity::create($input);
        return redirect('admin/activity');
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
        $res = Activity::find($id)->delete();
        if ($res) {
            $data = [
                'status' => 0,
                'message' => '删除成功'
            ];
        } else {
            $data = [
                'status' => 1,
                'message' => '删除失败'
            ];
        }

        return $data;
    }
}
