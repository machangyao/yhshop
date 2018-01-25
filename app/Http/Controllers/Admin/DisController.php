<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Models\Admin\Dispatchs;

class DisController extends Controller
{
    public function dispatchs(Request $request){

        $dis = Dispatchs::orderBy('did','asc')
            ->where(function($query) use($request){
                $username = $request->input('keywords');
                if(!empty($username)) {
                    $query->where('dis_tel','like','%'.$username.'%');
                }
            })
            ->paginate($request->input('num', 3));
        return view('admin/dispatchs',['dis'=>$dis, 'request'=> $request]);

    }
}
