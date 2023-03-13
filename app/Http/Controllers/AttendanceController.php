<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Attendance;
use App\Models\Field;
use App\Models\Employee;
use App\User;
use App\Http\Requests\AttendanceRequest;
use Carbon\Carbon;

class AttendanceController extends Controller
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
     * 勤怠一覧表示
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function showAttendanceList(Request $request) {
        $attendance = new Attendance;
        $attendances = $attendance -> attendances();
        $time = Carbon::now();
        $day = $attendance -> dateBuilder();

        //検索機能
        $year = $request -> input('year');
        $month = $request -> input('month');
        
        $query = Attendance::query() -> withTrashed();

        if (empty($year) || empty($month)) {
            $query -> whereYear('date', $time);
            $query -> whereMonth('date',  $time);
        }
        if (!empty($year)) {
            $query -> whereYear('date',  $year);
        }
        if (!empty($month)) {
            $query -> whereMonth('date',  $month);
        }

        $lists = $query -> get();

        return view('attendance.attendance_list',compact('attendances', 'lists', 'year', 'month'));
    }

    /**
     * 勤怠登録画面を表示する
     * @return \Illuminate\Contracts\Support\Renderable
     */

     public function showAttendanceCreate(Request $request) {

        $employees = Employee::all();
        $fields = Field::all();
        
        return view('attendance.attendance_create', compact('employees', 'fields'));
    }

    /**
     * 勤怠を登録する
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function exeAttendanceStore(Request $request) {

        $inputs = $request -> all();

        \DB::beginTransaction();
        try {
            // 商品を登録
            Attendance::create($inputs);
            \DB::commit();
        } catch(\Throwable $e) {
            \DB::rollback();
            abort(500);
        };

        \Session::flash('err_msg', '勤怠を登録しました。');
        return redirect(route('attendance-list'));
    }

    /**
     * 勤怠詳細を表示する
     * @param int $id
     * @return \Illuminate\Contracts\Support\Renderable 
     */
    public function showAttendanceDetale($id) {
        $attendance = Attendance::with('fields','employees') -> withTrashed() -> find($id);

        if(is_null($attendance)) {
            \Session::flash('err_msg', 'データがありません。');
            return redirect(route('attendance_list'));
        }

        return view('attendance.attendance_detail', compact('attendance'));
    }

    /**
     * 勤怠編集画面を表示する
     * @return \Illuminate\Contracts\Support\Renderable
     */

     public function showAttendanceEdit($id) {
        $attendance = Attendance::withTrashed() -> find($id);
        $employees = Employee::withTrashed() -> get();
        $fields = Field::withTrashed() -> get();
        
        return view('attendance.attendance_edit', compact('attendance', 'employees', 'fields'));
    }

    /**
     * 勤怠を更新する
     * @return \Illuminate\Contracts\Support\Renderable
     */

     public function exeAttendanceUpdate(AttendanceRequest $request) {

        $inputs = $request -> all();

        \DB::beginTransaction();
        try {
            // 商品を更新
            $attendance = Attendance::withTrashed() -> find($inputs['id']);
            $attendance -> fill([
             'date' => $inputs['date'],
             'field_id' => $inputs['field_id'],
             'employee_id' => $inputs['employee_id'],
             'start_time' => $inputs['start_time'],
             'closing_time' => $inputs['closing_time'],
             'overtime' => $inputs['overtime'],
             'attendance_comment' => $inputs['attendance_comment'],
            ]);
            $attendance -> save();
            \DB::commit();
        } catch(\Throwable $e) {
            \DB::rollback();
            abort(500);
        };

        \Session::flash('err_msg', '勤怠を更新しました。');
        return redirect(route('attendance-list'));
    }

    /**
    * 勤怠削除
    * @param int $id
    * @return view
    */
    public function exeAttendanceDelete($id) {

        if(empty($id)) {
            \Session::flash('err_msg', 'データがありません。');
            return redirect(route('attendance-list'));
        }

        try {
            //勤怠を削除
            Attendance::withTrashed() -> forceDelete($id);
        } catch(\Throwable $e) {
            abort(500);
        };

        \Session::flash('err_msg', '削除しました。');
        return redirect(route('attendance-list'));
    }
}
