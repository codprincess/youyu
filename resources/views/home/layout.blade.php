<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="api-token" content="Bearer {{ $apiToken??"" }}">
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
        .app-footer{
            font-size: 0;
            position: fixed;
            bottom:0;
            padding-top:3px;
            background: #fff;
            left:0;
            width:100%;
            border-top:1px solid #ddd;

        }
        .footer-item{
            font-size: 0.3rem;
            width:33.33%;
            height:100%;
            display: inline-block;
            text-align: center;
            padding-top: 16px;
            background-repeat: no-repeat;
            background-size: 24px 24px;
            background-position: center top;
            padding-bottom: 0.2rem;
            color:#333;
        }
        .footer-item.router-link-active{
            color:#00bcd4;
        }

        /*html, body, #app, .wrapper {*/
        /*    width: 100%;*/
        /*    height: 100%;*/
        /*    overflow: hidden;*/
        /*}*/

        /*body {*/
        /*    font-family: "Helvetica Neue", Helvetica, "microsoft yahei", arial, STHeiTi, sans-serif;*/
        /*}*/
    </style>
</head>
<body>
<div id="app">
    <keep-alive exclude="Detail">
        <router-view/>
    </keep-alive>
    <div class="app-footer">
        <router-link class="footer-item" to='/'>订场</router-link>
        <router-link class="footer-item" to='/order'>我的订单</router-link>
        <router-link class="footer-item" to='/user'>联系</router-link>
    </div>
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