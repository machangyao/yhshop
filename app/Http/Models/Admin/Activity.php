<?php

namespace App\Http\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    public $table = 'activitys';

    public $primaryKey = 'aid';

    public $guarded = [];

    public $timestamps = false;
}
