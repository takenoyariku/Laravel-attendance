<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Attendance;
use App\Models\Field;
use App\Models\Employee;
use App\User;

class AdminController extends Controller
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
     * ユーザ覧表示
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function showAdminList()
    {
        $user = new User;
        $admins = $user -> admins();
        $members = $user -> members();

        return view('admin.admin_list', compact('admins', 'members'));
    }

    /**
     * ユーザ詳細表示
     * @param int $id
     * @return \Illuminate\Contracts\Support\Renderable 
     */
    public function showAdminDetail($id) {
        $user = User::find($id);

        if(is_null($user)) {
            \Session::flash('err_msg', 'データがありません。');
            return redirect(route('admin'));
        }

        return view('admin.admin_detail', compact('user'));
    }

        /**
    * ユーザ編集フォームを表示する
    * @param int $id
    * @return \Illuminate\Contracts\Support\Renderable
    */
    public function showAdminEdit($id) {
        $user = User::find($id);

        if(is_null($user)) {
            \Session::flash('err_msg', 'データがありません。');
            return redirect(route('admin'));
        }

        return view('admin.admin_edit', compact('user'));
    }

    /**
     * ユーザを更新する
    * @return \Illuminate\Contracts\Support\Renderable
    */

    public function exeAdminUpdate(Request $request) {
        // 商品のデータを受け取る
        $inputs = $request -> all();

        \DB::beginTransaction();
        try {
            // 商品を更新
            $user = User::find($inputs['id']);
            $user -> fill([
                'name' => $inputs['name'],
                'email' => $inputs['email'],
                'password' => Hash::make($inputs['password']),
            ]);
            $user -> save();
            \DB::commit();
        } catch(\Throwable $e) {
            \DB::rollback();
            abort(500);
        };

        \Session::flash('err_msg', 'ユーザ情報を更新しました。');
        return redirect(route('admin'));
    }

    /**
    * ユーザ削除
    * @param int $id
    * @return view
    */
    public function exeAdminDelete($id) {

        if(empty($id)) {
            \Session::flash('err_msg', 'データがありません。');
            return redirect(route('admin'));
        }

        try {
            //ユーザを削除
            User::destroy($id);
        } catch(\Throwable $e) {
            abort(500);
        };

        \Session::flash('err_msg', '削除しました。');
        return redirect(route('admin'));
    }

    
}
