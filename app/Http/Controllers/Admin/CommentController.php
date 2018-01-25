<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Models\Admin\Comment;

class CommentController extends Controller
{
    public function comment(Request $request){

        $comment = comment::orderBy('id','asc')
            ->where(function($query) use($request){
                $username = $request->input('keywords');
                if(!empty($username)) {
                    $query->where('title','like','%'.$username.'%');
                }
            })
            ->paginate($request->input('num', 3));
        return view('admin/comment',['comment'=>$comment, 'request'=> $request]);
    }
}
