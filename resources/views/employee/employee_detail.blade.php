@extends('layouts.attendance')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                
                <div class="card-header">
                    <h4>
                    従業員詳細
                    </h4>
                    <div class="legacy-button">
                        <a href="/employee-edit/{{ $employee -> id }}"><i class="fa-solid fa-pen-to-square fa-2x"></i></a>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-striped" id="product">
                        <tr>
                            <th>従業員氏名</th>
                            <th>備考</th>
                        </tr>
                        <tr class="dbconect">
                            <td class="dbconect">{{ $employee -> employee_name }}</td>
                            <td class="dbconect">{{ $employee -> employee_comment }}</td>
                        </tr>
                    </table>
                    <div class="delete">
                        <button class="btn btn-danger" onclick="location.href='/employee-delete/{{ $employee -> id }}'">削除する</button>
                    </div>
                    <div class="back">
                        <button class="btn btn-light" onclick="location.href='{{ route('employee-list') }}'">戻る</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
