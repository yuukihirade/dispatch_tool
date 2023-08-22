@extends('layouts.admin')
@section('title','今日のドライバー配車')
@section('script')
    <script>
        window.Laravel = {};
        window.Laravel.hoge= {!! $hoge !!};
    </script>
@endsection
@section('content')
@viteReactRefresh @vite(['resources/css/app.css', 'resources/js/app.jsx'])
    <div id="react_app"></div>
@endsection