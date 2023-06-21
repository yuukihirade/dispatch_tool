@extends ('layouts.admin')
@section ('title', '配車申請編集 & 配車確定')
@section ('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <h2>配車申請編集 & 配車確定フォーム</h2>
            </div>
        </div>
        <div class="row">
            @if (count($errors) > 0)
                <ul>
                    @foreach ($errors->all() as $e)
                        <li>{{ $e }}</li>
                    @endforeach
                </ul>
            @endif
        </div>
        <div class="row">
            <div class="col">
                <form action="{{ route('dispatch.request.update') }}" method="post" class="form-group" enctype="multipart/form-data">
                    
                        <!--<div class="row">-->
                        <!--    <div class="col">-->
                        <!--        <input type="text" id="cond_customer" name="cond_customer" size="15" placeholder="顧客名を絞り込む" >-->
                        <!--    </div>-->
                        <!--    <div class="col">-->
                        <!--        <input type="submit" class="btn btn-outline-primary" name="search" value="検索">-->
                        <!--    </div>-->
                        <!--</div>-->
                    <div class="row">
                        <div class="col">
                            <label for="start_datetime">開始時間</label>
                            <input class="form-control" type="datetime-local" id="start_datetime" name="start_datetime" value="{{ old('start_datetime')}}">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label for="end_datetime">終了時間</label>
                            <input class="form-control" type="datetime-local" id="end_datetime" name="end_datetime" value="{{ old('end_datetime')}}">
                        </div>
                    </div>
                    <div class="row">
                        <div class="row">
                            <div class="col">
                                <label for="customer_id" class="form-label">顧客名</label>
                                <select class="form-select" aria-label="Default select example" id="customer_id" name="customer_id">
                                    
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label for="location_id" class="form-label">現場名</label>
                            <select class="form-select" aria-label="Default select example" id="location_id" name="location_id">
                                
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="row">
                            <div class="col">
                                <p class="h4">車両情報の選択</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <label for="size_category_id" class="form-label">車両サイズ</label>
                                <select class="form-select" aria-label="Default select example" id="size_category_id" name="size_category_id">
                                    <option value="" selected>車両サイズを選択してください</option>
                                    @foreach($size_categories as $size_category)
                                    <option value="{{ $size_category->id }}" >{{ $size_category->name . 't車'}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col">
                                <label for="ability_id" class="form-label">車両機能</label>
                                <select class="form-select" aria-label="Default select example" id="ability_id" name="ability_id">
                                    <option value="" selected>車両機能を選択してください</option>
                                    @foreach($abilities as $ability)
                                    <option value="{{ $ability->id }}" >{{ $ability->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label for="item" class="form-control">持ち物</label>
                            <input id="item" type="text" class="form-control" name="item" value="{{ old('item') }}">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label for="method">引取方法:</label>
                            <textarea id="method" name="method" rows="5" cols="50" value="{{ old('method') }}"></textarea>
                        </div>
                    </div>
                    <div class="row">
                            <div class="col">
                                <label for="user_id" class="form-label">担当者</label>
                                <select class="form-select" aria-label="Default select example" id="user_id" name="user_id">
                                    <option value="" selected>担当者を選択してください</option>
                                    @foreach($users as $user)
                                    <option value="{{ $user->id }}" >{{ $user->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    <div class="row">
                        <div class="col">
                            <label for="image">説明画像</label>
                            <input id="image" type="file" name="image[]" multiple>
                            <!--画像に複数のfileを値に入れる可能性があるため、multipleにして、nameを配列にしている-->
                        </div>
                        <div class="form-text text-info">
                                設定中: {{ $dispatch_request->image_path }}
                        </div>
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="checkbox" class="form-check-input" name="remove" value="true">画像を削除
                            </label>
                        </div>
                    <div class="row">
                        <div class="col">
                            <label for="description">説明詳細:</label>
                            <textarea id="description" name="description" rows="15" cols="70" value="{{ old('description') }}"></textarea>
                        </div>
                    </div>
                    <!--if文で or や and など使うときは、以下のように最初からフルセンテンスで書かなければ動作しない-->
                    @if (Auth::user()->department_id == 1 or Auth::user()->department_id == 3)
                        <div class="row">
                            <div class="col">
                                <h3>配車確定アクション</h3>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <label for="driver">運転手</label>
                                <input type="text" name="driver" id="driver" value="{{ old('driver') }}">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <label for="car_id" class="form-label">車両選択</label>
                                <select class="form-select" aria-label="Default select example" id="car_id" name="car_id">
                                    <option value='' selected>車両を選択してください</option>
                                    @foreach ( $cars as $car)
                                    <option value="{{ $car->id }}">{{ $car->registration_number }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <fieldset>
                                    <legend>承認確認</legend>
                                    <div>
                                      <input type="checkbox" id="approval_status" name="approval_status" value="1">
                                      <label for="approval_status">承認する</label>
                                    </div>
                                </fieldset>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                @csrf
                                <input type="submit" class="btn btn-outline-warning" name="" value="配車確定">
                            </div>
                        </div>
                    @else
                        <div class="row">
                            <div class="col">
                                @csrf
                                <input type="submit" class="btn btn-outline-primary" name="submit" value="変更する">
                            </div>
                        </div>
                    @endif
                </form>
            </div>
        </div>
    </div>
    <script type="text/javascript">
    /*global customers*/
        let customers = @json($customers);
        let cateCustomers = [];
        let cateCustomersElement = document.getElementById('customer_id');
        let locations = @json($locations);
        let cateLocationsElement = document.getElementById('location_id');
        
    </script>
    <script src="{{ asset('/js/select_location.js') }}"></script>
@endsection