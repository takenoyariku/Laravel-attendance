@extends('layouts.attendance')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h4>
                        勤怠詳細
                    </h4>
                    <div class="legacy-button">
                        <a href="/attendance-edit/{{$attendance -> id}}"><i class="fa-solid fa-pen-to-square fa-2x"></i></a>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <tr>
                            <th>現場</th>
                            <th>従業員氏名</th>
                            <th>勤務時間</th>
                            <th>残業時間</th>
                            <th>備考</th>
                        </tr>

                        <tr class="dbconect">
                            <td class="dbconect">{{ $attendance -> fields -> field_name }}</td>
                            <td class="dbconect">{{ $attendance -> employees -> employee_name }}</td>
                            <td class="dbconect">{{ $attendance -> start_time }} 〜 {{ $attendance -> closing_time }}</td>
                            <td class="dbconect">{{ $attendance -> overtime }}</td>
                            <td class="dbconect">{{ $attendance -> attendance_comment }}</td>
                        </tr>
                    </table>
                    <div class="delete">
                        <button class="btn btn-delete" onclick="location.href='/attendance-delete/{{ $attendance -> id }}'">削除する</button>
                    </div>
                    <div class="back">
                        <button class="btn back" onclick="location.href='{{ route('attendance-list') }}'">戻る</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
