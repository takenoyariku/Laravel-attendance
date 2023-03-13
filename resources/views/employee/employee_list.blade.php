@extends('layouts.attendance')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card-head">
                <div class="card-title">
                    従業員一覧
                    <a href="/employee-create" class="btn btn-primary">新規作成</a>
                </div>
            </div>
            <div class="card">
                @foreach ($employees as $employee)
                <div class="card-list flex-box">
                <a href="/employee-detail/{{ $employee -> id }}" class="btn btn--green">{{ $employee -> employee_name }}</a>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
