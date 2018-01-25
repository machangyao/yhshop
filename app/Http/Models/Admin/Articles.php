<?php

namespace App\Http\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Articles extends Model
{
    //
    public $table = 'articles';


    public $primaryKey = 'article_id';

    public $guarded = [];

    public $timestamps = false;
}
