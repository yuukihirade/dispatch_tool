@extends('layouts.admin')
@section('title', '配車申請一覧')
@section('content');
    <div class="container">
        <div class="row">
            <div class="col">
                <h2>{{ $date . 'の配車確定一覧'}}</h2>
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
                          <th scope="col">運転手</th>
                          <th scope="col">希望車両</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($dispatch_requests as $r)
                            @if ($r->approval_status != null))
                                <tr>
                                    <th scope="row">{{ $r->start_datetime->format('Y年m月d日') . $r->start_datetime->format('H:i') . ' ~ ' . $r->end_datetime->format('H:i') }}</th>
                                    <td>{{ $r->customer->name }}</td>
                                    <td>{{ $r->location->name }}</td>
                                    <td>{{ $r->driver->name}}</td>
                                    <td>{{ $r->car->registration_number}}</td>
                                    <td>
                                        <div>
                                            <a href="{{ route('dispatch.request.detail.accepted', ['id' => $r->id]) }}">詳細</a>
                                        </div>
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection