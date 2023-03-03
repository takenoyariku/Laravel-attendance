@extends('layouts.attendance')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h4>
                        勤怠編集
                    </h4>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form action="{{ route('attendance-update') }}" method="POST" onSubmit="return checkSubmit()" enctype="multipart/form-data">
                    @csrf
                        <div class="form-group row">
                            <input type="hidden" name="id" class="form-control" value="{{ $attendance -> id }}">
                            @if($errors -> has('id'))
                                <div class="text-danger">
                                    {{ $errors -> first('id') }}
                                </div>
                            @endif
                        </div>
                        <div class="form-group row">
                                <label for="date" class="col-md-4 col-form-label text-md-right">日付</label>
                            <div class="form-time">
                                <input id="date" type="date" class="form-control-untext" name="date" value="{{ $attendance->date->format('Y-m-d') }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="field_id" class="col-md-4 col-form-label text-md-right">現場</label>
                            <div class="col-md-6">
                                <select class="form-control" id="field_id" name="field_id">
                                    @foreach ($fields as $field)
                                    @if ($attendance -> field_id === $field -> id )
                                        <option value="{{ $field -> id }}" selected="selected">{{ $field -> field_name }}</option>
                                    @else
                                        <option value ="{{$field -> id}}">{{ $field -> field_name }}</option>
                                    @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="employee_id" class="col-md-4 col-form-label text-md-right">従業員氏名</label>

                            <div class="col-md-6">
                                <select class="form-control" id="employee_id" name="employee_id">
                                @foreach ($employees as $employee)
                                    @if ($attendance -> employee_id === $employee -> id )
                                        <option value="{{ $employee -> id }}" selected="selected">{{ $employee -> employee_name }}</option>
                                    @else
                                        <option value ="{{$employee -> id}}">{{ $employee -> employee_name }}</option>
                                    @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="start_time" class="col-md-4 col-form-label text-md-right">勤務時間</label>

                            <div class="form-time">
                                <input id="start_time" type="time" class="form-control-untext" name="start_time" value="{{ $attendance -> start_time }}">　〜　<input id="closing_time" type="time" class="form-control-untext" name="closing_time" value="{{ $attendance -> closing_time }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="overtime" class="col-md-4 col-form-label text-md-right">残業時間</label>

                            <div class="col-md-6">
                                <input id="overtime" type="time" class="form-control" name="overtime" value="{{ $attendance -> overtime }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="attendance_comment" class="col-md-4 col-form-label text-md-right">コメント</label>
                            
                            <div class="col-md-6">
                            <textarea type="text" class="form-control" name="attendance_comment">{{ $attendance -> attendance_comment }}</textarea>
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    登録する
                                </button>
                            </div>
                        </div>
                    </form>
                    <button class="btn back" onclick="location.href='/attendance-detail/{{ $attendance -> id }}'">
                        戻る
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
