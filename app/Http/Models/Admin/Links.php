<?php

namespace App\Http\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Links extends Model
{
    //
    public $table = 'links';


    public $primaryKey = 'link_id';

    public $guarded = [];

    public $timestamps = false;
}
