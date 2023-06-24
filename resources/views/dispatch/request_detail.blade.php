@extends ('layouts.admin')
@section ('title', '配車申請詳細')
@section ('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <h2>{{'ID : ' . $dispatch_request->id . ' : 配車申請詳細情報'}}</h2>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <table class="table table-striped">
                    <tr>
                        <th scope="col">日付</th>
                        <td>{{ $dispatch_request->start_datetime->format('Y年m月d日')}}</td>
                    </tr>
                    <tr>
                        <th scope="col">時間帯</th>
                        <td>{{ $dispatch_request->start_datetime->format('H : i') . '~' . $dispatch_request->end_datetime->format('H : i') }}</td>
                    </tr>
                    <tr>
                        <th scope="col">顧客名</th>
                        <td>{{ $dispatch_request->customer->name }}</td>
                    </tr>
                    <tr>
                        <th scope="col">現場名</th>
                        <td>{{ $dispatch_request->location->name }}</td>
                    </tr>
                    <tr>
                        <th scope="col">車両サイズ</th>
                        <td>{{ $dispatch_request->size_category->name . 't' }}</td>
                    </tr>
                    <tr>
                        <th scope="col">車両機能</th>
                        <td>{{ $dispatch_request->ability->name }}</td>
                    </tr>
                    <tr>
                        <th scope="col">持ち物</th>
                        <td>{{ $dispatch_request->item }}</td>
                    </tr>
                    <tr>
                        <th scope="col">引取方法</th>
                        <td>{{ $dispatch_request->method }}</td>
                    </tr>
                    <tr>
                        <th scope="col">担当者</th>
                        <td>{{ $dispatch_request->user->name }}</td>
                    </tr>
                    <tr>
                        <th scope="col">説明画像</th>
                        @if (isset($array_image))
                            @foreach ($array_image as $image)
                                <td><img src="{{ secure_asset('storage/image/' . $image) }}"></td>
                            @endforeach
                        @endif
                    </tr>
                    <tr>
                        <th scope="col">説明詳細</th>
                        <td>{{ $dispatch_request->description }}</td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <button type="button" class="btn btn-warning"><a href="{{ route('dispatch.request.edit', ['dispatch_request_id' => $dispatch_request->id] )}}">編集 or 承認</a></button>
            </div>
        </div>
    </div>
@endsection