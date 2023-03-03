<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Attendance;
use App\Models\Field;
use App\Models\Employee;
use App\User;

class MemberController extends Controller
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
     * ユーザ詳細表示
     * @param int $id
     * @return \Illuminate\Contracts\Support\Renderable 
     */
    public function showMemberDetail($id) {
        $user = User::find($id);

        if(is_null($user)) {
            \Session::flash('err_msg', 'データがありません。');
            return redirect(route('attendance-list'));
        }

        return view('member.member_detail', compact('user'));
    }

        /**
    * ユーザ編集フォームを表示する
    * @param int $id
    * @return \Illuminate\Contracts\Support\Renderable
    */
    public function showMemberEdit($id) {
        $user = User::find($id);

        return view('member.member_edit', compact('user'));
    }

    /**
     * ユーザを更新する
    * @return \Illuminate\Contracts\Support\Renderable
    */

    public function exeMemberUpdate(Request $request) {
        // ユーザのデータを受け取る
        $inputs = $request -> all();

        \DB::beginTransaction();
        try {
            // ユーザを更新
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
        return redirect(route('attendance-list'));
    }
   
}
