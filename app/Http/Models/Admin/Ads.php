<?php

namespace App\Http\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Ads extends Model
{
    //
     public $table = 'ads';


    public $primaryKey = 'ads_id';

    public $guarded = [];

    public $timestamps = false;

}
