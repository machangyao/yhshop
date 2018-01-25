<?php

namespace App\Http\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class comment extends Model
{
    public $table = 'comments';

    public $primaryKey = 'id';
}
