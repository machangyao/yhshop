<?php

namespace App\Models\Home;

use Illuminate\Database\Eloquent\Model;

class Site_config extends Model
{
    
    public $table = 'site_config';


    public $primaryKey = 'site_id';

    public $guarded = [];

    public $timestamps = false;

}
