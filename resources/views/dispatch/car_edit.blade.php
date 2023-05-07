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
                        <input class="form-control" type="text" id="registration_number" name="registration_number" value="{{ $car->registration_number }}">
                    </div>
                    <div class="col">
                        <label class="form-label" for="size_category_id">車両サイズ</label>
                        <select class="form-select" aria-label="Default select" id="size_category_id" name="size_category_id">
                          <option value="">車両サイズを選択してください</option>
                          @foreach ($size_categories as $size_category)
                            <option value="{{ $size_category->id }}">{{ $size_category->name . 't車'}}</option>
                          @endforeach
                        </select>
                    </div>
                    <div class="col">
                        <label class="form-label" for="ability_id">機能</label>
                        <select class="form-select" aria-label="Default select" id="ability_id" name="ability_id">
                          <option value="">機能を選択してください</option>
                          @foreach ($abilities as $ability)
                            <option value="{{ $ability->id }}">{{ $ability->name }}</option>
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
        <div class="col">
            <a href="{{ route('dispatch.car.delete', ['car_id' => $car->id])}}" class="class"="btn btn-danger">この車両を削除する</a>
        </div>
    </div>
</div>

@endsection