<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="api-token" content="{{ Auth::check() ? 'Bearer '.Auth::user()->api_token : 'Bearer ' }}">
    <title>控制面板</title>
    <link rel="stylesheet" href="{{ URL::asset('static/home/css/reset.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('static/home/css/border.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('static/home/css/iconfont.css') }}">
    <!-- Styles -->
    <style>
        * {
            margin: 0;
            padding: 0;
        }

        html, body, #app, .wrapper {
            width: 100%;
            height: 100%;
            overflow: hidden;
        }

        body {
            font-family: "Helvetica Neue", Helvetica, "microsoft yahei", arial, STHeiTi, sans-serif;
        }
    </style>
</head>
<body>
<div id="app">
    <keep-alive exclude="Detail">
        <router-view/>
    </keep-alive>
</div>
<script type="text/javascript" src="{{ URL::asset('static/home/js/app.js')}}"></script>
{{--<script type="text/javascript">--}}
{{--$.ajaxSetup({--}}
{{--headers: {--}}
{{--'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),--}}
{{--'Authorization': 'Bearer '+$('meta[name="api-token"]').attr('content'),--}}
{{--}--}}
{{--});--}}
{{--</script>--}}
</body>
</html>