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
                    <div class="form-group row">
                    <label for="password" class="col-md-4 col-form-label text-md-right">現場</label>

                    <div class="form-time">
                        <input id="password" type="text" class="form-control-untext">
                    </div>
                    </div>
                    <div class="form-group row">
                        <label for="password" class="col-md-4 col-form-label text-md-right">コメント</label>
                        
                        <div class="col-md-6">
                        <textarea type="text" class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="form-group row mb-0">
                        <div class="col-md-8 offset-md-4">
                            <button class="btn back" onclick="location.href='/Users/takenoyariku/勤怠管理/field-list.html'">
                            戻る
                        </button>
                            <button type="submit" class="btn btn-primary" onclick="location.href='/Users/takenoyariku/勤怠管理/field-list.html'">
                                更新する
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
