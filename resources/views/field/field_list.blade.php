@extends('layouts.attendance')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card-head">
                <div class="card-title">
                    現場一覧
                    <a href="/field-create" class="btn btn-primary">新規作成</a>
                </div>
            </div>
            <div class="card">
                @foreach ($fields as $field)
                <div class="card-list list-button">
                    <a href="/field-detail/{{ $field -> id }}" class="btn btn--green">{{ $field -> field_name }}</a>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
