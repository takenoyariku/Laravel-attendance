<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Employee;
use App\Models\Field;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;

class Attendance extends Model
{

    use SoftDeletes;

    protected $guarded = ['created_at', 'updated_at'];

    protected $dates = [
        'date',
    ];

    public function employees()
    {
        return $this -> belongsTo('App\Models\Employee', 'employee_id') -> withTrashed();
    }

    public function fields()
    {
        return $this -> belongsTo('App\Models\Field', 'field_id') -> withTrashed();
    }

    public function attendances()
    {
        return $this::withTrashed()
        ->with('fields','employees')
        ->get();
    }
    
    public function dateBuilder()
    {
        return $this::selectRaw('DAY(date) as day')
        ->withTrashed()
        ->count();
    }



}
