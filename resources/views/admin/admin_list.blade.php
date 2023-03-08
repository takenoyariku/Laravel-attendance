@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h4>ユーザ一覧</h4>
                    <div class="legacy-button">
                    <a href="{{ route('register') }}" class="btn btn--circle btn--circle-c btn--shadow">＋</a>
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
                            <th>管理者アカウント</th>
                            <th></th>
                        </tr>
                        @foreach($admins as $admin)
                        <tr class="dbconect">
                            <td class="table-user">{{ $admin -> name }}</td>
                            <td class="dbconect">                        
                                <button class="btn btn-light" onclick="location.href='/admin-detail/{{ $admin -> id }}'">詳細</button>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                    <table class="table table-striped table-members">
                        <tr>
                            <th>ユーザーアカウント</th>
                            <th></th>
                            <th></th>
                        </tr>
                        @foreach($members as $member)
                        <tr class="dbconect">
                            <td class="table-user">{{ $member -> name }}</td>
                            <td class="dbconect">                        
                                <button class="btn btn-light" onclick="location.href='/admin-detail/{{ $member -> id }}'">詳細</button>
                            </td>
                                <td><button class="btn btn-danger" onclick="location.href='/admin-delete/{{ $member -> id }}'">削除</button></td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
