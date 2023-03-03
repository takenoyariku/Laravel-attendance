<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Employee;
use App\Models\Field;
use Illuminate\Database\Eloquent\SoftDeletes;

class Attendance extends Model
{

    use SoftDeletes;

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
        return $this -> belongsTo('App\Models\Employee', 'employee_id') -> withTrashed();
    }

    public function fields() {
        return $this -> belongsTo('App\Models\Field', 'field_id') -> withTrashed();
    }

    protected $dates = [
        'date',
    ];

}
