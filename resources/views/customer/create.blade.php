@extends ('layouts.admin')
@section ('title', '顧客登録画面')
@section ('content')
    <div class="container">
        <div class="row">
            <h2>顧客新規登録</h2>
        </div>
        <div class="row">
            @if (count($errors) > 0)
                <ul>
                    @foreach ($errors->all() as $e)
                        <li>{{ $e }}</li>
                    @endforeach
                </ul>
            @endif
        </div>
        <div class="row">
            <form action="{{ route('customer.create') }}" method="post" class="form-group">
                <div class="row">
                    <div class="col">
                        <label for="name" class="form-label">顧客名</label>
                        <input type="text" id="name" class="form-control" name="name" value="{{ old('name') }}">
                    </div>
                <div class="row">
                    <div class="col">
                        @csrf
                        <input type="submit" class="btn-outline-primary" value="登録">
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection