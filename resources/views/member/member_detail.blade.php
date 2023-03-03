@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">ユーザ一覧
                    <div class="legacy-button">
                    <a href='/member-edit/{{$user -> id}}'><i class="fa-solid fa-pen-to-square fa-2x"></i></a>
                    </div>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <table class="table table-striped">
                        <tr>
                            <th>ユーザー名</th>
                            <th>メールアドレス</th>
                        </tr>

                        <tr class="dbconect">
                            <td class="dbconect">{{ $user -> name }}</td>
                            <td class="dbconect">{{ $user -> email }}</td>
                        </tr>
                    </table>
                    <button class="btn back" onclick="location.href='/attendance-list'">
                    戻る
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
