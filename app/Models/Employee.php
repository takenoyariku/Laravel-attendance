<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Attendance;

class Employee extends Model
{

    use SoftDeletes;

    protected $fillable = 
    [
        'employee_name',
        'employee_comment',
    ];

    public function Attendances() {
        return $this->hasMany('App\Models\Attendance');
    }
}
