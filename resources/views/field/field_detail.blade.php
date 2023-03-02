@extends('layouts.attendance')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                
                <div class="card-header">
                    <h4>
                    現場詳細
                    </h4>
                    <div class="legacy-button">
                        <a href="/Users/takenoyariku/勤怠管理/field-edit.html"><i class="fa-solid fa-pen-to-square fa-2x"></i></a>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-striped" id="product">
                        <tr>
                            <th>現場</th>
                            <th>備考</th>
                        </tr>

                        <tr class="dbconect">
                            <td class="dbconect">菅間</td>
                            <td class="dbconect">３月末まで</td>
                        </tr>
                    </table>
                    <div class="delete">
                        <button class="btn btn-delete">削除する</button>
                    </div>
                    <div class="back">
                        <button class="btn back" onclick="location.href='/Users/takenoyariku/勤怠管理/field-list.html'">戻る</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
