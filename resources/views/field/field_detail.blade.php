@extends('layouts.attendance')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                
                <div class="card-header">
                    <h4>
                    現場詳細
                    </h4>
                    <div class="legacy-button">
                        <a href="/field-edit/{{ $field -> id }}"><i class="fa-solid fa-pen-to-square fa-2x"></i></a>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-striped" id="product">
                        <tr>
                            <th>現場</th>
                            <th>備考</th>
                        </tr>
                        <tr class="dbconect">
                            <td class="dbconect">{{ $field -> field_name }}</td>
                            <td class="dbconect">{{ $field -> field_comment }}</td>
                        </tr>
                    </table>
                    <div class="delete">
                        <button class="btn btn-danger" onclick="location.href='/field-delete/{{ $field -> id }}'">削除する</button>
                    </div>
                    <div class="back">
                        <button class="btn btn-light" onclick="location.href='{{ route('field-list') }}'">戻る</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
