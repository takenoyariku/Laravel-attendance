@extends('layouts.attendance')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h4>
                        勤怠登録
                    </h4>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form action="{{ route('attendance-store') }}" method="POST" onSubmit="return checkSubmit()" enctype="multipart/form-data">
                    @csrf
                        <div class="form-group row">
                                <label for="date" class="col-md-4 col-form-label text-md-right">日付</label>
                            <div class="form-time">
                                <input id="date" type="date" class="form-control-untext" name="date">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="field_id" class="col-md-4 col-form-label text-md-right">現場</label>
                            <div class="col-md-6">
                                <select class="form-control" id="field_id" name="field_id">
                                    <option value="">選択してください</option>
                                    @foreach ($fields as $field)
                                    <option value="{{$field -> id}}">{{ $field -> field_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="employee_id" class="col-md-4 col-form-label text-md-right">従業員氏名</label>

                            <div class="col-md-6">
                                <select class="form-control" id="employee_id" name="employee_id">
                                    <option value="">選択してください</option>
                                    @foreach ($employees as $employee)
                                    <option value="{{$employee -> id}}">{{ $employee -> employee_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="start_time" class="col-md-4 col-form-label text-md-right">勤務時間</label>

                            <div class="form-time">
                                <input id="start_time" type="time" class="form-control-untext" name="start_time">　〜　<input id="closing_time" type="time" class="form-control-untext" name="closing_time">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="overtime" class="col-md-4 col-form-label text-md-right">残業時間</label>

                            <div class="col-md-6">
                                <input id="overtime" type="time" class="form-control" name="overtime">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="attendance_comment" class="col-md-4 col-form-label text-md-right">コメント</label>
                            
                            <div class="col-md-6">
                            <textarea type="text" class="form-control" name="attendance_comment"></textarea>
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
                    <button class="btn back" onclick="location.href='{{ route('attendance-list') }}'">
                        戻る
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
