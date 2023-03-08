@extends('layouts.attendance')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h4>
                    現場編集
                    </h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('field-update') }}" method="POST" onSubmit="return checkSubmit()" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row">
                            <input type="hidden" name="id" class="form-control" value="{{ $field -> id }}">
                            @if($errors -> has('id'))
                                <div class="text-danger">
                                    {{ $errors -> first('id') }}
                                </div>
                            @endif
                        </div>
                    <div class="form-group row">
                        <label for="field-name" class="col-md-4 col-form-label text-md-right">現場</label>

                        <div class="form-time">
                            <input id="field-name" type="text" class="form-control-untext" name="field_name" value="{{ $field -> field_name }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="field-comment" class="col-md-4 col-form-label text-md-right">備考</label>
                        
                        <div class="col-md-6">
                            <textarea type="text" class="field-comment" name="field_comment">{{ $field -> field_comment }}</textarea>
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
                    <button class="btn btn-light" onclick="location.href='/field-detail/{{ $field -> id }}'">
                        戻る
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
