@extends('layouts.attendance')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
            
                <div class="card-header">
                    <h4>
                    従業員一覧
                    </h4>
                    <div class="legacy-button">
                        <a href="/employee-create" class="btn btn--circle btn--circle-c btn--shadow">＋</a>
                    </div>
                </div>
                @foreach ($employees as $employee)
                <div class="card-body flex-box">
                    <a href="/employee-detail/{{ $employee -> id }}" class="btn btn--green">{{ $employee -> employee_name }}</a>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
