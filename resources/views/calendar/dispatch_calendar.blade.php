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
<script
  src="https://code.jquery.com/jquery-3.6.0.min.js"
  integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
  crossorigin="anonymous"></script>
<script>
  //本日、カレンダーの開始日、終了日と、曜日のテキストを用意します
  var date_now = new Date();
  var date_start = new Date(date_now.getFullYear(), date_now.getMonth(), 1);
  var date_end = new Date(date_now.getFullYear(), date_now.getMonth(), 1);
  var days = ["日", "月", "火", "水", "木", "金", "土"];
  date_end.setMonth(date_end.getMonth()+12);
  
  // スケジュールのデータを用意する
  var dispatch_requests = @json($js_dispatch);
  
  
  
  
  
  
  
   
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
   
      //イベント情報をJSONファイルから読み込みます
  		events: dispatch_requests,
   
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
        //alert(obj.event.title);
        var eventUrl = "/dispatch/request/detail_accepted?id=" + obj.event.id;
        
        //console.log(obj.event.id);
        window.location.href = eventUrl;
      },
      
      // 各日付セルが描画されるときの処理
      navLinks: true,
      navLinkDayClick: function(date, jsEvent) {
        var localDate = new Date(date.getTime() - (date.getTimezoneOffset() * 60000));
        var formattedDate = localDate.toISOString().split('T')[0];
        var url = "/dispatch/request/date_accepted?date="+ formattedDate;
        window.location.href = url;
        // Ajaxリクエストを送信して日付をコントローラーに渡す
        
        /*
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            }
        });
        
        $.ajax({
          url: url,
          method: "POST",
          dataType: "json",
          data: {
            date: formattedDate,
          }
        }).done(function(res){
          window.location.href = res.redirectUrl;
          console.log(res);
        }).fail(function(jqXHR, textStatus, errorThrown){
          $('#calendar').html('通信が無効です');
          console.log("jqXHR          : " + jqXHR.status); // HTTPステータスが取得
          console.log("textStatus     : " + textStatus);    // タイムアウト、パースエラー
          console.log("errorThrown    : " + errorThrown.message); // 例外情報
          console.log("URL            : " + url);
        });
        */
        
      }
    });
    calendar.render();
  });
</script>
@endsection