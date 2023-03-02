<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Http\Controllers\AttendanceController;

class AttendanceRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'date' => 'required',
            'field_id' => 'required',
            'employee_id' => 'required',
            'start_time' => 'required',
            'closing_time' => 'required',
            'overtime' => 'required',
            'attendance_comment' => 'required | max:255',
        ];
    }
}
