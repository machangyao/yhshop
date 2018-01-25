<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Models\Admin\Re;

class ReController extends Controller
{
    public function recommend(){
        return view('admin.recommend');
    }
}
