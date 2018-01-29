<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Models\Admin\Pay;

class PayController extends Controller
{
    public function pay(Request $request)
    {
        $pay = Pay::orderBy('pid','asc')
            ->where(function($query) use($request){
                $username = $request->input('keywords');
                if(!empty($username)) {
                    $query->where('pay_way','like','%'.$username.'%');
                }
            })
            ->paginate($request->input('num', 3));
        return view('admin/pay',['pay'=>$pay, 'request'=> $request]);
    }

    public function pays($id)
    {
        $res = Pay::find($id)->delete();
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

