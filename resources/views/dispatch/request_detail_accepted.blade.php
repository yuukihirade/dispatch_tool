@extends ('layouts.admin')
@section ('title', '確定済配車詳細')
@section ('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <h2>{{'ID : ' . $dispatch_request->id . '          確定済配車詳細情報'}}</h2>
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
                    <tr>
                        <th scope="col">運転手</th>
                        <td>{{ $dispatch_request->driver->name }}</td>
                    </tr>
                    <tr>
                        <th scope="col">確定車両</th>
                        <td>{{ $dispatch_request->car->registration_number }}</td>
                    </tr>
                </table>
            </div>
        </div>
        @if (Auth::user()->department_id == 1 or Auth::user()->department_id == 3)
            <div class="row">
                <div class="col">
                    <form action="{{ route('dispatch.request.return') }}" method="post">
                        @if (count($errors) > 0)
                            <ul>
                                @foreach ($errors->all() as $e)
                                    <li>{{ $e }}</li>
                                @endforeach
                            </ul>
                        @endif
                        <div class="row">
                            <div class="col">
                                <fieldset>
                                    <legend>承認キャンセル</legend>
                                    <div>
                                      <input type="hidden" id="approval_status" name="approval_status" value='' >
                                      <input type="checkbox" id="approval_status" name="approval_status" value='0' >
                                      <label for="approval_status">承認を取り消す</label>
                                    </div>
                                </fieldset>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <input type="hidden" name="id" value="{{ $dispatch_request->id }}">
                                <input type="hidden" name="car_id" value="">
                                <input type="hidden" name="driver" value="">
                            </div>
                            <div class="col">
                                @csrf
                                <input type="submit" class="btn btn-outline-warning" name="cancel" value="承認キャンセル">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        @endif
    </div>
@endsection