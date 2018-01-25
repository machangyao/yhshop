<?php

namespace App\Http\Models\Home;

use Illuminate\Database\Eloquent\Model;

class collects extends Model
{
    //
    public $table = 'collects';
    public $primaryKey = 'id';
    public function goods(){
        return $this->belongsTo('App\Http\Models\Admin\Goods', 'gid', 'id');

    }
}
