<?php

namespace App\Http\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Pay extends Model
{
    public $table = 'pays';

    public $primaryKey = 'pid';

    public $guarded = [];
}
