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
        <div class="row">
            <div class="col">
                <table class="table">
                    <thead>
                        <tr>
                          <th scope="col">日時</th>
                          <th scope="col">顧客名</th>
                          <th scope="col">現場名</th>
                          <th scope="col">希望車両</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($dispatch_requests as $r)
                        <tr>
                            <th scope="row">{{ $r->start_datetime->format('Y年m月d日') . $r->start_datetime->format('H:i') . ' ~ ' . $r->end_datetime->format('H:i') }}</th>
                            <td>{{ $r->customer->name }}</td>
                            <td>{{ $r->location->name }}</td>
                            <td>{{ $r->size_category->name .'t' . $r->ability->name}}</td>
                            <td>
                                <div>
                                    <a href="{{ route('dispatch.request.detail', ['id' => $r->id]) }}">詳細</a>
                                </div>
                            </td>
                            <td>
                                <div>
                                    <button type="button" class="btn btn-warning"><a href="{{ route('dispatch.request.edit', ['dispatch_request_id' => $r->id] )}}">編集 or 承認</a></button>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection