@extends ('layouts.admin')
@section ('title', '顧客詳細')
@section ('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <h2>{{ $customer->name . ' の 現場詳細情報'}}</h2>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <a href="{{ route('customer.location.add') }}">
                    <button type="button" class="btn btn-outline-secondary">新規現場追加</button>
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">現場名</th>
                            <th scope="col">住所</th>
                            <th scope="col">地図</th>
                            <th scope="col">Google Map</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($locations as $location)
                            <tr>
                                <th scope="row">{{ $location->name }}</th>
                                <td>{{ $location->address }}</td>
                                @if ($location->hasMultipleMapImages())
                                    <?php $map_array = explode(',', $location->map_path); ?>
                                    @foreach ($map_array as $map)
                                        <td><img src="{{ secure_asset('storage/map/' . $map) }}"></td>
                                    @endforeach
                                @elseif (isset($location->map_path) and false === strpos($location->map_path, ','))
                                    <td><img src="{{ secure_asset('storage/map/' . $location->map_path) }}"></td>
                                @endif
                                <td><iframe src="https://maps.google.co.jp/maps?output=embed&q={{$location->address}}&z=16" width="600" height="400" frameborder="0" scrolling="no" ></iframe></td>
                                <td><a href="{{ route('customer.location.edit', ['id' => $location->id]) }}">編集</a> </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection