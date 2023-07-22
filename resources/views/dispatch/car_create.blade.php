@extends('layouts.admin')
@section('title', '自動車登録フォーム')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <p class="h2">自動車登録フォーム</p>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <form action="{{ route('dispatch.car.create')}}" method="post">
                    
                    @if (count($errors) > 0)
                        <ul>
                            @foreach ($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    @endif
                    
                    <div class="form-group row">
                        <label for="registration_number" class="col">車両ナンバー</label>
                        <div class="col">
                            <input type="text" id="registration_number" name="registration_number" value="{{ old('registration_number') }}">
                        </div>
                        <div class="col">
                            <label for="size_category_id">車両サイズ</label>
                            <select id="size_category_id" name="size_category_id">
                                <option value="">車両サイズを選択してください</option>
                                @foreach ($size_categories as $size_category)
                                    <option value="{{ $size_category->id }}" @if( $size_category->id == old('size_category_id')) selected @endif>{{ $size_category->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col">
                            <label for="ability_id">機能</label>
                            <select id="ability_id" name="ability_id">
                                <option value="">機能を選択してください</option>
                                @foreach ($abilities as $ability)
                                    <option value="{{ $ability->id }}" @if( $ability->id == old('ability_id')) selected @endif>{{ $ability->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col">
                            <input type="hidden" name="id">
                            @csrf
                            <input type="submit" class="col btn-outline-primary" value="登録">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection