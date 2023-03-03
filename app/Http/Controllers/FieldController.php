<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Attendance;
use App\Models\Field;
use App\Models\Employee;
use App\User;
use App\Http\Requests\FieldRequest;


class FieldController extends Controller
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
    public function showFieldList()
    {
        $fields = Field::all();

        return view('field.field_list',compact('fields'));
    }

    /**
     * 現場登録画面を表示する
     * @return \Illuminate\Contracts\Support\Renderable
     */

     public function showFieldCreate(Request $request) {

        return view('field.field_create');
    }

    /**
     * 現場を登録する
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function exeFieldStore(FieldRequest $request) {

        $inputs = $request -> all();

        \DB::beginTransaction();
        try {
            // 現場を登録
            Field::create($inputs);
            \DB::commit();
        } catch(\Throwable $e) {
            \DB::rollback();
            abort(500);
        };

        \Session::flash('err_msg', '現場情報を登録しました。');
        return redirect(route('field-list'));
    }

    /**
     * 現場詳細を表示する
     * @param int $id
     * @return \Illuminate\Contracts\Support\Renderable 
     */
    public function showFieldDetale($id) {
        $field = Field::find($id);

        if(is_null($field)) {
            \Session::flash('err_msg', 'データがありません。');
            return redirect(route('field-list'));
        }

        return view('field.field_detail', compact('field'));
    }

    /**
     * 現場登録画面を表示する
     * @return \Illuminate\Contracts\Support\Renderable
     */

     public function showFieldEdit($id) {
        $field = Field::find($id);
        
        return view('field.field_edit', compact('field'));
    }

    /**
     * 現場を更新する
     * @return \Illuminate\Contracts\Support\Renderable
     */

     public function exeFieldUpdate(FieldRequest $request) {

        $inputs = $request -> all();

        \DB::beginTransaction();
        try {
            // 商品を更新
            $field = Field::find($inputs['id']);
            $field -> fill([
             'field_name' => $inputs['field_name'],
             'field_comment' => $inputs['field_comment'],
            ]);
            $field -> save();
            \DB::commit();
        } catch(\Throwable $e) {
            \DB::rollback();
            abort(500);
        };

        \Session::flash('err_msg', '現場情報を更新しました。');
        return redirect(route('field-list'));
    }

}
