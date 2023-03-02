<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Employee;
use App\Models\Field;

class Attendance extends Model
{
    protected $fillable = 
    [
        'date',
        'field_id',
        'employee_id',
        'start_time',
        'closing_time',
        'overtime',
        'attendance_comment',
    ];

    public function employees() {
        return $this->belongsTo('App\Models\Employee', 'employee_id');
    }

    public function fields() {
        return $this->belongsTo('App\Models\Field', 'field_id');
    }

    protected $dates = [
        'date',
    ];

}
