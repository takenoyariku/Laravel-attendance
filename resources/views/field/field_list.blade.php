@extends('layouts.attendance')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
            
                <div class="card-header">
                    <h4>
                    現場一覧
                    </h4>
                <div class="legacy-button">
                    <a href="/field-create" class="btn btn--circle btn--circle-c btn--shadow">＋</a>
                </div>
                </div>
                @foreach ($fields as $field)
                <div class="card-body list-button">
                    <a href="/field-detail/{{ $field -> id }}" class="btn btn--green">{{ $field -> field_name }}</a>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
