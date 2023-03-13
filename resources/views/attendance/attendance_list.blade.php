@extends('layouts.attendance')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card-head">
                <div class="card-title">
                    勤怠一覧
                    <a href="/attendance-create" class="btn btn-primary">新規作成</a>
                </div>
                <div class="btn-search">
                    <form action="{{ route('attendance-list') }}" method="GET">
                    @csrf
                        <div class="search">
                            <label>対象期間</label>
                            <select id="year" name="year">
                            @foreach ($attendances as $attendance)
                                @if ($year === $attendance -> date -> format('Y') )
                                    <option value="{{ $attendance -> date -> format('Y') }}" selected="selected">{{ $attendance -> date -> format('Y') }}</option>
                                @else
                                    <option value ="{{ $attendance -> date -> format('Y') }}">{{ $attendance -> date -> format('Y') }}</option>
                                @endif
                            @endforeach
                            </select>
                            <select id="month" name="month">
                            @foreach ($attendances as $attendance)
                                @if ($month === $attendance -> date -> format('m') )
                                    <option value="{{ $attendance -> date -> format('m') }}" selected="selected">{{ $attendance -> date -> format('m') }}</option>
                                @else
                                    <option value ="{{ $attendance -> date -> format('m') }}">{{ $attendance -> date -> format('m') }}</option>
                                @endif
                            @endforeach
                            </select>
                            <button type="submit" class="btn btn-primary">
                                表示する
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="card">
                <div class="card-list">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <table class="table table-striped">
                        <tr>
                            @foreach ($lists as $list)
                            <th style="width: 5%">{{ $list -> date -> format('Y') }}/{{ $attendance -> date -> format('m') }}</th>
                            @endforeach
                            <th style="width: 30%">現場</th>
                            <th style="width: 30%">氏名</th>
                            <th style="width: 15%">勤務時間</th>
                            <th style="width: 10%">残業時間</th>
                            <th style="width: 10%"></th>
                        </tr>

                        @foreach($lists as $list)
                        <tr class="dbconect">
                            <td></td>
                            <td class="dbconect">{{ $list -> fields -> field_name }}</td>
                            <td class="dbconect">{{ $list -> employees -> employee_name }}</td>
                            <td class="dbconect">{{  substr($list -> start_time, 0, 5) }} 〜 {{ substr($list -> closing_time, 0, 5) }}</td>
                            <td class="dbconect">{{ substr($list -> overtime, 0, 5) }}</td>
                            <td class="dbconect">                        
                                <button class="btn btn-light" onclick="location.href='/attendance-detail/{{ $attendance -> id }}'">詳細</button>
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
                            <td>{{ $list -> overtime }}</td>
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
