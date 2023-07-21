@extends ('layouts.admin')
@section ('title', 'ユーザー編集画面')
@section ('content')
<div class="container">
    <div class="row">
        <div class="col">
            <h2>{{ 'ユーザーID:' . $user->id . ' ' . $user->name . ' 編集画面' }}</h2>
        </div>
        <div class="col">
            <form action="{{ route('admin.user.update') }}" method="post">
                
                @if (count($errors) > 0)
                    <ul>
                        @foreach ($errors->all() as $e)
                            <li>{{ $e }}</li>
                        @endforeach
                    </ul>
                @endif
                
                <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('messages.name') }}</label>

                    <div class="col-md-6">
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                        
                <div class="row mb-3">
                    <label for="department_id" class="col-md-4 col-form-label text-md-end">{{ __('messages.department') }}</label>
                    
                    <select class="form-control" id="department_id" name="department_id">
                        @foreach(App\Models\Department::all() as $department)
                            <option value="{{ $department->id }}">{{ $department->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="row mb-3">
                    <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('messages.email') }}</label>

                    <div class="col-md-6">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('messages.password') }}</label>

                    <div class="col-md-6">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('messages.confirm_password') }}</label>

                    <div class="col-md-6">
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                    </div>
                </div>

                <div class="row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <input type="hidden" name="id" value="{{ $user->id }}">
                        @csrf
                        <input type="submit" class="btn btn-primary" value="編集">
                    </div>
                </div>
            </form>
        </div>
        <div class="row">
            <div class="col">
                <form method="get" action="{{ route('admin.user.delete') }}" onSubmit="return check()">
                    <input type="hidden" name="id" value="{{ $user->id }}">
                    <input type="submit" class="btn btn-danger" id="deleteButton" name="deleteButton" value="この現場を削除する">
                </form>
            </div>
        </div>
    </div>
</div>
<script src="/js/deleteButton.js"></script>
@endsection