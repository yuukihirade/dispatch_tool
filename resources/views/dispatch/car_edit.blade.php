@extends('layouts.admin')
@section('title', '車両情報編集')
@section('content')

<div class="container">
    <div class="row">
        <div class="col">
            <h2>車両情報編集フォーム</h2>
        </div>
        <div class="col">
            <form action="{{ route('dispatch.car.update') }}" method="post">
                
                @if (count($errors) > 0)
                    <ul>
                        @foreach ($errors->all() as $e)
                            <li>{{ $e }}</li>
                        @endforeach
                    </ul>
                @endif
                
                <div class="form-group row">
                    <div class="col">
                        <label class="form-label" for="registration_number">登録ナンバー</label>
                        <input class="form-control" type="text" id="registration_number" name="registration_number" value="{{ old('registration_number', $car->registration_number) }}">
                    </div>
                    <div class="col">
                        <label class="form-label" for="size_category_id">車両サイズ</label>
                        <select class="form-select" aria-label="Default select" id="size_category_id" name="size_category_id">
                          <option value="">車両サイズを選択してください</option>
                          @foreach ($size_categories as $size_category)
                            <option value="{{ old('size_category_id', $size_category->id) }}" @if( $size_category->id == old('size_category_id')) selected @endif>{{ $size_category->name . 't車'}}</option>
                          @endforeach
                        </select>
                    </div>
                    <div class="col">
                        <label class="form-label" for="ability_id">機能</label>
                        <select class="form-select" aria-label="Default select" id="ability_id" name="ability_id">
                          <option value="">機能を選択してください</option>
                          @foreach ($abilities as $ability)
                            <option value="{{ old('ability_id', $ability->id) }}" @if( $ability->id == old('ability_id')) selected @endif>{{ $ability->name }}</option>
                          @endforeach
                        </select>
                    </div>
                    <div class="col">
                        <input type="hidden" name="id" value="{{ $car->id }}">
                        @csrf
                        <input type="submit" class="col btn-outline-primary" value="更新">
                    </div>
                </div>
            </form>
        </div>
        <div class="row">
            <div class="col">
                <form method="get" action="{{ route('dispatch.car.delete') }}" onSubmit="return check()">
                    <input type="hidden" name="id" value="{{ $car->id }}">
                    <input type="submit" class="btn btn-danger" id="deleteButton" name="deleteButton" value="この車両を削除する">
                </form>
            </div>
        </div>
    </div>
</div>
<script src="/js/deleteButton.js"></script>
@endsection