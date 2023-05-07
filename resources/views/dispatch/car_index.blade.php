@extends('layouts.admin')
@section('title', '登録済み車両管理画面')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <h2>登録済み車両管理画面</h2>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <a href="{{ route('dispatch.car.add') }}"><button type="button" class="btn btn-outline-secondary">車両新規登録</button></a>
            </div>
            <div class="col">
                <form action="{{ route('dispatch.car.index') }}" method="get">
                    <div class="form-group row">
                        <div class="col">
                            <label for="size_category_id">車両サイズ</label> 
                            <select id="size_category_id" name="size_category_id">
                                <option value="">車両サイズを選択してください</option>
                                @foreach ($size_categories as $size_category)
                                    <option value="{{ $size_category->id }}">{{ $size_category->name . 't車'}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col">
                            <label for="ability_id">機能</label>
                            <select id="ability_id" name="ability_id">
                                <option value="">機能を選択してください</option>
                                @foreach ($abilities as $ability)
                                    <option value="{{ $ability->id }}">{{$ability->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col">
                            @csrf
                            <input type="submit" name="search" class="btn btn-primary" value="検索">
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <table class="table">
                    <thead>
                        <tr>
                          <th scope="col">id</th>
                          <th scope="col">登録ナンバー</th>
                          <th scope="col">車両サイズ</th>
                          <th scope="col">機能</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($cars as $car)
                        <tr>
                            <th scope="row">{{ $car->id }}</th>
                            <td>{{ $car->registration_number }}</td>
                            <td>{{ $car->size_category()->get()->first()->name . 't車'}}</td>
                            <td>{{ $car->ability->name}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection