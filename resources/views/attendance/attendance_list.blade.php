@extends('layouts.attendance')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h4>
                        勤怠一覧
                    </h4>
                    <div class="legacy-button">
                        <a href="{{ route('attendance-create') }}" class="btn btn--circle btn--circle-c btn--shadow">＋</a>
                    </div>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <table class="table table-striped">
                        <tr>
                            <th>現場</th>
                            <th>従業員氏名</th>
                            <th>勤務時間</th>
                            <th>残業時間</th>
                            <th></th>
                        </tr>

                        @foreach($attendances as $attendance)
                        <tr class="dbconect">
                            <td class="dbconect">{{ $attendance -> fields -> field_name }}</td>
                            <td class="dbconect">{{ $attendance -> employees -> employee_name }}</td>
                            <td class="dbconect">{{ $attendance -> start_time }} 〜 {{ $attendance -> closing_time }}</td>
                            <td class="dbconect">{{ $attendance -> overtime }}</td>
                            <td class="dbconect">                        
                                <button class="btn btn-detail" onclick="location.href='/attendance-detail/{{ $attendance -> id }}'">詳細</button>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                    <table class="table table-striped">
                        <tr>
                            <th>従業員氏名</th>
                            <th>残業時間合計</th>
                        </tr>
                        @foreach($attendances as $attendance)
                        <tr>
                            <td>{{ $attendance -> employees -> employee_name }}</td>
                            <td>6H</td>
                        </tr>
                        @endforeach
                    </table>
                    <div class="exe">
                        <button type="submit" class="btn btn-primary" onclick="location.href='/Users/takenoyariku/勤怠管理/attendance-exe.html'">
                            出力する
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
