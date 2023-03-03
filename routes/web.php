<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::middleware('auth')->group(function () {
//管理者ユーザ
    //管理者画面 ユーザ一覧を表示
    Route::get('/admin', 'AdminController@showAdminList')->name('admin');
    //ユーザ削除
    Route::get('/admin-delete/{id}','AdminController@exeAdminDelete') -> name('admin-delete');
    //管理者側ユーザ詳細を表示
    Route::get('/admin-detail/{id}', 'AdminController@showAdminDetail')->name('admin-detail');
    //管理者側ユーザ編集画面を表示
    Route::get('/admin-edit/{id}','AdminController@showAdminEdit') -> name('admin-edit');
    //管理者側ユーザ編集
    Route::post('/admin-update','AdminController@exeAdminUpdate') -> name('admin-update');

//メンバーユーザ
    //メンバー側ユーザ詳細を表示
    Route::get('/member-detail/{id}', 'MemberController@showMemberDetail')->name('member-detail');
    //メンバー側ユーザ編集画面を表示
    Route::get('/member-edit/{id}','MemberController@showMemberEdit') -> name('member-edit');
    //管理者側ユーザ編集
    Route::post('/member-update','MemberController@exeMemberUpdate') -> name('member-update');

//勤怠管理
    //勤怠一覧を表示
    Route::get('/attendance-list', 'AttendanceController@showAttendanceList')->name('attendance-list');
    //勤怠新規登録画面を表示
    Route::get('/attendance-create', 'AttendanceController@showAttendanceCreate')->name('attendance-create');
    //勤怠削除
    Route::get('/attendance-delete/{id}','AttendanceController@exeAttendanceDelete') -> name('attendance-delete');
    //勤怠新規登録
    Route::post('/attendance-store', 'AttendanceController@exeAttendanceStore')->name('attendance-store');
    //勤怠詳細画面を表示
    Route::get('/attendance-detail/{id}', 'AttendanceController@showAttendanceDetale')->name('attendance-detail');
    //勤怠編集画面を表示
    Route::get('/attendance-edit/{id}','AttendanceController@showAttendanceEdit') -> name('attendance-edit');
    //勤怠編集
    Route::post('/attendance-update', 'AttendanceController@exeAttendanceUpdate')->name('attendance-update');

//現場管理
    //現場一覧を表示
    Route::get('/field-list', 'FieldController@showFieldList')->name('field-list');
    //現場新規登録画面を表示
    Route::get('/field-create', 'FieldController@showFieldCreate')->name('field-create');
    //現場削除
    Route::get('/field-delete/{id}','FieldController@exeFieldDelete') -> name('field-delete');
    //現場新規登録
    Route::post('/field-store', 'FieldController@exeFieldStore')->name('field-store');
    //現場詳細画面を表示
    Route::get('/field-detail/{id}', 'FieldController@showFieldDetale')->name('field-detail');
    //現場編集画面を表示
    Route::get('/field-edit/{id}','FieldController@showFieldEdit') -> name('field-edit');
    //現場編集
    Route::post('/field-update', 'FieldController@exeFieldUpdate')->name('field-update');

//従業員管理
    //従業員一覧を表示
    Route::get('/employee-list', 'EmployeeController@showEmployeeList')->name('employee-list');
    //従業員新規登録画面を表示
    Route::get('/employee-create', 'EmployeeController@showEmployeeCreate')->name('employee-create');
    //従業員削除
    Route::get('/employee-delete/{id}','EmployeeController@exeEmployeeDelete') -> name('employee-delete');
    //従業員新規登録
    Route::post('/employee-store', 'EmployeeController@exeEmployeeStore')->name('employee-store');
    //従業員詳細画面を表示
    Route::get('/employee-detail/{id}', 'EmployeeController@showEmployeeDetale')->name('employee-detail');
    //従業員編集画面を表示
    Route::get('/employee-edit/{id}','EmployeeController@showEmployeeEdit') -> name('employee-edit');
    //従業員編集
    Route::post('/employee-update', 'EmployeeController@exeEmployeeUpdate')->name('employee-update');

});