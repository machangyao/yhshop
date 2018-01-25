<?php

namespace App\Http\Models\Home;

use Illuminate\Database\Eloquent\Model;

class Slides extends Model
{
    //
    public $table = 'slides';

    public $primaryKey = 'slide_id';

    public $guarded = [];

    public $timestamps = false;
}
