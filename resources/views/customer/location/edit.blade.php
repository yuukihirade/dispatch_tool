@extends ('layouts.admin')
@section ('title', '顧客の現場編集フォーム')
@section ('content')
    <div class="container">
        <div class="row">
            <div class="col">
                @if (count($errors) > 0)
                    <ul>
                    @foreach ($errors->all() as $e)
                        <li>{{ $e }}</li>
                    @endforeach
                    </ul>
                @endif
            </div>
        </div>
        <div class="row">
            <div class="col">
                <h2>{{$location->customer->name . '(' . $location->name . ') 編集ページ'}}</h2>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <form action="{{ route('customer.location.update') }}" method="post" class="form-group" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col">
                            <label for="customer_id" class="form-label">顧客名</label>
                            <select class="form-select" aria-label="Default select example" id="customer_id" name="customer_id">
                                <option value="" selected>顧客名を選択してください</option>
                                @foreach($customers as $customer)
                                <option value="{{ $customer->id }}" >{{ $customer->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label for="name" class="form-label">現場名</label>
                            <input type="text" id="name" name="name" class="form-control" value="{{ old('name') }}">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label for="address" class="form-label">住所</label>
                            <input id="address" type="text" class="form-control" name="address" value="{{ old('address') }}">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label for="map">地図画像</label>
                            <input id="map" type="file" name="map[]" multiple>
                            <!--地図画像に複数のfileを値に入れる可能性があるため、multipleにして、nameを配列にしている-->
                        </div>
                        <div class="form-text text-info">
                                設定中: {{ $location->map_path }}
                        </div>
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="checkbox" class="form-check-input" name="remove" value="true">画像を削除
                            </label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <input type="hidden" name="id" value="{{ $location->id }}">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            @csrf
                            <input type="submit" class="btn btn-outline-primary" value="編集する">
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <form method="get" action="{{ route('customer.location.delete') }}" onSubmit="return check()">
                    <input type="hidden" name="id" value="{{ $location->id }}">
                    <input type="submit" class="btn btn-danger" id="deleteButton" name="deleteButton" value="この現場を削除する">
                </form>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>
    <script src="/js/deleteButton.js"></script>
@endsection