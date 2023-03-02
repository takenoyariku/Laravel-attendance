<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Attendance;

class Field extends Model
{

    use SoftDeletes;

    protected $fillable = 
    [
        'field_name',
        'field_comment',
    ];

    public function Attendances() {
        return $this->hasMany('App\Models\Attendance');
    }
}
