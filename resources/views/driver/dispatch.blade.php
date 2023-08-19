@extends('layouts.admin')
@section('title','今日のドライバー配車')
@section('content')
<div class="container">
        <div class="row">
            <div class="col">
                <h1>本日の配車</h1>
            </div>
        </div>
        <div class="row">
            <div class="table-responsive, col">
                <table class="table">
                  <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col" colspan="4">午前</th>
                        <th scope="col" colspan="4">午後</th>  
                    </tr>
                    <tr>
                      <th scope="col">運転手 / 配車順</th>
                      <th scope="col">1</th>
                      <th scope="col">2</th>
                      <th scope="col">3</th>
                      <th scope="col">4</th>
                      <th scope="col">5</th>
                      <th scope="col">6</th>
                      <th scope="col">7</th>
                      <th scope="col">8</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <th scope="row">ドライバー1</th>
                      <td>Cell</td>
                      <td>Cell</td>
                      <td>Cell</td>
                      <td>Cell</td>
                      <td>Cell</td>
                      <td>Cell</td>
                      <td>Cell</td>
                      <td>Cell</td>
                    </tr>
                    <tr>
                      <th scope="row">ドライバー2</th>
                      <td>Cell</td>
                      <td>Cell</td>
                      <td>Cell</td>
                      <td>Cell</td>
                      <td>Cell</td>
                      <td>Cell</td>
                      <td>Cell</td>
                      <td>Cell</td>
                    </tr>
                    <tr>
                      <th scope="row">ドライバー3</th>
                      <td>Cell</td>
                      <td>Cell</td>
                      <td>Cell</td>
                      <td>Cell</td>
                      <td>Cell</td>
                      <td>Cell</td>
                      <td>Cell</td>
                      <td>Cell</td>
                    </tr>
                  </tbody>
                </table>
              </div>
        </div>
        <div class="row">
            <!-- Cellをクリックしたときに表示される現場詳細 -->
            <div class="card">
                <div class="card-header">
                    日時
                </div>
                <div class="card-body">
                    <h5 class="card-title">日付</h5>
                    <p class="card-text">4月1日</p>
                </div>
                <div class="card-body">
                    <h5 class="card-title">時間帯</h5>
                    <p class="card-text">8:00 ~ 10:00</p>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    顧客情報
                </div>
                <div class="card-body">
                    <h5 class="card-title">引取先 (現場名)</h5>
                    <p class="card-text">リンナイ (掛川)</p>
                    <!-- 現場詳細画面へ遷移 -->
                    <a href="#" class="btn btn-primary">現場地図</a>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    車両
                </div>
                <div class="card-body">
                    <h5 class="card-title">車種</h5>
                    <p class="card-text">4t ユニック</p>
                    <h5 class="card-title">車番</h5>
                    <p class="card-text">浜松 あ 343 ..25</p>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">持ち物</h5>
                    <p class="card-text">ハコ x10</p>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">引取方法</h5>
                    <p class="card-text">リフト</p>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">担当者</h5>
                    <p class="card-text">石神</p>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                  <h5 class="card-title">詳細説明 (画像)</h5>
                  <p class="card-text">現場狭いです。気を付けて</p>
                  <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                </div>
                <img src="#" class="card-img-bottom" alt="card-img-bottom">
            </div>
        </div>
    </div>
@endsection