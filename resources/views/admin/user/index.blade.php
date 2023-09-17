@extends ('layouts.admin')
@section ('title', 'ユーザー管理一覧画面')
@section ('content')
<div class="container">
        <div class="row">
            <div class="col">
                <h2>ユーザー管理一覧画面</h2>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <a class="nav-link" href="{{ route('register') }}"><button type="button" class="btn btn-outline-secondary">ユーザー新規登録</button></a>
            </div>
            <div class="col">
                <form action="{{ route('admin.user.index') }}" method="get" class="form-group row">
                    <div class="form-group">
                        <input type="text" name="cond_name" class="form-control col-5" placeholder="キーワードを入力してください">
                    </div>
                    <div class="form-group">
                        <input type="submit" class="col-2 btn-secondary" name="search" value="検索">
                    </div>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <table class="table table-striped">
                    <thead>
                        <tr>
                          <th scope="col">id</th>
                          <th scope="col">ユーザー名</th>
                          <th scope="col">メールアドレス</th>
                          <th scope="col">パスワード</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                        <tr>
                          <th scope="row">{{ $user->id }}</th>
                          <td>{{ $user->name }}</td>
                          <td>{{ $user->email }}</td>
                          <td>{{ $user->password }}</td>
                          <td><a href="{{ route('admin.user.edit', ['id' => $user->id]) }}">編集</a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection