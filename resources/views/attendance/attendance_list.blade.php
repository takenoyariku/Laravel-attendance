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
                        <a href="/attendance-create" class="btn btn--circle btn--circle-c btn--shadow">＋</a>
                    </div>
                </div>

                <form action="{{ route('attendance-list') }}" method="GET">
                @csrf
                    <div class="search">
                        <label>対象期間</label>
                        <select id="year" name="year">
                        @foreach ($attendances as $attendance)
                            <option value ="{{ $attendance -> date -> format('Y') }}">{{ $attendance -> date -> format('Y') }}</option>
                        @endforeach
                        </select>
                        <select id="month" name="month">
                        @foreach ($attendances as $attendance)
                            <option value ="{{ $attendance -> date -> format('m') }}">{{ $attendance -> date -> format('m') }}</option>
                        @endforeach
                        </select>
                        <button type="submit" class="btn btn-primary">
                            表示する
                        </button>
                    </div>
                </form>

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

                        @foreach($lists as $list)
                        <tr class="dbconect">
                            <td class="dbconect">{{ $list -> fields -> field_name }}</td>
                            <td class="dbconect">{{ $list -> employees -> employee_name }}</td>
                            <td class="dbconect">{{ $list -> start_time }} 〜 {{ $attendance -> closing_time }}</td>
                            <td class="dbconect">{{ $list -> overtime }}</td>
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
                        @foreach($lists as $list)
                        <tr>
                            <td>{{ $list -> employees -> employee_name }}</td>
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
