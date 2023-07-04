@extends('layouts.admin')
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/4.2.0/core/main.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/4.2.0/daygrid/main.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/4.2.0/core/main.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/4.2.0/daygrid/main.min.js"></script>

</head>
@section('title', '配車確定カレンダー')
@section('content')
 
<!-- カレンダーのコンテナ -->
<div id="calendar"></div>
<script>
 
//本日、カレンダーの開始日、終了日と、曜日のテキストを用意します
var date_now = new Date();
var date_start = new Date(date_now.getFullYear(), date_now.getMonth(), 1);
var date_end = new Date(date_now.getFullYear(), date_now.getMonth(), 1);
var days = ["日", "月", "火", "水", "木", "金", "土"];
date_end.setMonth(date_end.getMonth()+12);
 
document.addEventListener("DOMContentLoaded", function() {
 
  //FullCalendarを生成します
  var calendar = new FullCalendar.Calendar(document.getElementById("calendar"), {
    
    
    //プラグインを読み込みます
    plugins: ["dayGrid"],
 
    //ヘッダー内の配置を、左に前月ボタン、中央にタイトル、右に次月ボタンに設定します
    header: {
      left: "prev",
      center: "title",
      right:" next"
    },
 
    //ボタンのテキストを書き換えます
    buttonText: {
      prev: "前の月",
      next: "次の月"
    },
 
    //デフォルト日を本日に設定します
    defaultDate: date_now,
 
    //有効期間を当月1日から12ヶ月後（1年後）に設定します。
		//validRange: {
      //start: date_start,
      //end: date_end
    //},
 
    //イベント情報をJSONファイルから読み込みます
		events: [
    {
        "title": "カラオケに行く",
        "start": "2023-07-01",
        "className": ["event event-01"]
    },
    {
        "title": "解体",
        "start": "2023-08-15",
        "className": ["event event-02"]
    },
    {
        "title": "イベント3",
        "start": "2019-10-15",
        "className": ["event event-03"]
    },
    {
        "title": "イベント4",
        "start": "2019-11-15",
        "className": ["event event-04"]
    },
    {
        "title": "イベント5",
        "start": "2019-12-15",
        "end": "2019-12-20",
        "className": ["event event-05"]
    }
    ],
 
    //タイトルを書き換えます（2019年8月）
    titleFormat: function(obj) {
      return obj.date.year+"年"+(obj.date.month+1)+"月";
    },
 
    //曜日のテキストを書き換えます（日〜土）
    columnHeaderText: function(obj) {
      return days[obj.getDay()];
    },
 
    //イベントのクリック時の処理を加えます
    eventClick: function(obj) {
      alert(obj.event.title);
    },
    
    // 各日付セルが描画されるときの処理
    navLinks: true,
    navLinkDayClick: function(date, jsEvent) {
      var localDate = new Date(date.getTime() - (date.getTimezoneOffset() * 60000));
      var formattedDate = localDate.toISOString().split('T')[0];
      console.log('day', formattedDate);
      console.log('coords', jsEvent.pageX, jsEvent.pageY);
    } 
  });
  calendar.render();
});

// 日付をクリックしたときの処理

</script>
@endsection