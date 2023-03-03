<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Attendance;
use App\Models\Field;
use App\Models\Employee;
use App\User;
use App\Http\Requests\EmployeeRequest;

class EmployeeController extends Controller
{
        /**
    * Create a new controller instance.
    *
    * @return void
    */
    public function __construct()
    {
    $this->middleware('auth');
    }

    /**
    * 現場一覧表示
    *
    * @return \Illuminate\Contracts\Support\Renderable
    */
    public function showEmployeeList()
    {
    $employees = Employee::all();

    return view('employee.employee_list',compact('employees'));
    }

    /**
    * 現場登録画面を表示する
    * @return \Illuminate\Contracts\Support\Renderable
    */

    public function showEmployeeCreate(Request $request) {

    return view('employee.employee_create');
    }

    /**
    * 現場を登録する
    * @return \Illuminate\Contracts\Support\Renderable
    */

    public function exeEmployeeStore(EmployeeRequest $request) {

    $inputs = $request -> all();

    \DB::beginTransaction();
    try {
        // 現場を登録
        Employee::create($inputs);
        \DB::commit();
    } catch(\Throwable $e) {
        \DB::rollback();
        abort(500);
    };

    \Session::flash('err_msg', '従業員情報を登録しました。');
    return redirect(route('employee-list'));
    }

    /**
    * 現場詳細を表示する
    * @param int $id
    * @return \Illuminate\Contracts\Support\Renderable 
    */
    public function showEmployeeDetale($id) {
    $employee = Employee::find($id);

    if(is_null($employee)) {
        \Session::flash('err_msg', 'データがありません。');
        return redirect(route('field-list'));
    }

    return view('employee.employee_detail', compact('employee'));
    }

    /**
    * 現場登録画面を表示する
    * @return \Illuminate\Contracts\Support\Renderable
    */

    public function showEmployeeEdit($id) {
    $employee = Employee::find($id);

    return view('employee.employee_edit', compact('employee'));
    }

    /**
    * 現場を更新する
    * @return \Illuminate\Contracts\Support\Renderable
    */

    public function exeEmployeeUpdate(EmployeeRequest $request) {

    $inputs = $request -> all();

    \DB::beginTransaction();
    try {
        // 商品を更新
        $employee = Employee::find($inputs['id']);
        $employee -> fill([
        'employee_name' => $inputs['employee_name'],
        'employee_comment' => $inputs['employee_comment'],
        ]);
        $employee -> save();
        \DB::commit();
    } catch(\Throwable $e) {
        \DB::rollback();
        abort(500);
    };

    \Session::flash('err_msg', '従業員情報を更新しました。');
    return redirect(route('employee-list'));
    }

}
