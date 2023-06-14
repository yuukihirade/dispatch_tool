@extends('layouts.admin')
@section('title', '配車申請一覧')
@section('content');
    <div class="container">
        <div class="row">
            <div class="col">
                <h2>配車申請一覧画面</h2>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <a href="{{ route('dispatch.request.add') }}"><button type="button" class="btn btn-outline-secondary">新規配車申請</button></a>
            </div>
            <div class="col">
                <form action="{{ route('dispatch.request.index') }}" method="get">
                    <div class="form-group row">
                        <div class="col">
                            <label for="cond_date">日付を選択してください</label> 
                            <input type="date" id="cond_date" name="cond_date">
                        </div>
                        <div class="col">
                            <label for="cond_customer">顧客名</label>
                            <input type="text" id="cond_customer" name="cond_customer" placeholder="顧客名を入力">
                        </div>
                        <div class="col">
                            @csrf
                            <input type="submit" name="search" class="btn btn-primary" value="検索">
                        </div>
                    </div>
                </form>
            </div>
        </div>
        
    </div>
@endsection