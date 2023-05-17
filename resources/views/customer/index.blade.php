@extends ('layouts.admin')
@section ('title', '顧客情報管理画面')
@section ('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <h2>顧客情報管理画面</h2>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <a href="{{ route('customer.add') }}"><button type="button" class="btn btn-outline-secondary">顧客新規登録</button></a>
            </div>
            <div class="col">
                <form action="{{ route('customer.index') }}" method="get" class="form-group row">
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
                          <th scope="col">顧客名</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($customers as $customer)
                        <tr>
                          <th scope="row">{{ $customer->id }}</th>
                          <td>{{ $customer->name }}</td>
                          <td><a href="{{ route('customer.detail', $customer->id) }}">詳細</a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection