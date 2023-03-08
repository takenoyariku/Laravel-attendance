@extends('layouts.attendance')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h4>
                    従業員編集
                    </h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('employee-update') }}" method="POST" onSubmit="return checkSubmit()" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row">
                            <input type="hidden" name="id" class="form-control" value="{{ $employee -> id }}">
                            @if($errors -> has('id'))
                                <div class="text-danger">
                                    {{ $errors -> first('id') }}
                                </div>
                            @endif
                        </div>
                    <div class="form-group row">
                        <label for="employee-name" class="col-md-4 col-form-label text-md-right">従業員氏名</label>

                        <div class="form-time">
                            <input id="employee-name" type="text" class="form-control-untext" name="employee_name" value="{{ $employee -> employee_name }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="employee-comment" class="col-md-4 col-form-label text-md-right">備考</label>
                        
                        <div class="col-md-6">
                            <textarea type="text" class="employee-comment" name="employee_comment">{{ $employee -> employee_comment }}</textarea>
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
                    <button class="btn btn-light" onclick="location.href='/employee-detail/{{ $employee -> id }}'">
                        戻る
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
