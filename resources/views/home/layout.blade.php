<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport"  content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="api-token" content="Bearer {{ $apiToken??"" }}">

    <title>今天有羽</title>
    <!-- Styles -->
    <style>
        * {
            margin: 0;
            padding: 0;
        }
        a {color: #000;text-decoration: none;}
        .weui-tabbar {
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            position: fixed !important;
            z-index: 500;
            bottom: 0;
            width: 100%;
            background-color: #F7F7FA;
            padding-bottom: 20px;
        }
        .weui-tabbar__item.weui-bar__item_on .weui-tabbar__icon, .weui-tabbar__item.weui-bar__item_on .weui-tabbar__icon > i, .weui-tabbar__item.weui-bar__item_on .weui-tabbar__label {
            color: #00bcd4 !important;
        }
        .weui-tabbar__label {
            text-align: center;
            color: #999999;
            font-size: 12px !important;
            line-height: 0 !important;
            margin-top: 10px !important;
        }
    </style>
</head>
<body>
<div id="app">
    <!--allmap->地图容器，无内容-->
{{--    <div id="allmap"></div>--}}
    <!-- <img src="./logo.png"> -->
    <!-- <router-view/> -->
    <keep-alive>
        <router-view ></router-view>
        <tabbar>
            <tabbar-item selected link="/">
                <img slot="icon" src="./js/home/images/home.png" >
                <span slot="label">订场</span>
            </tabbar-item>
            <tabbar-item link="/order">
                <img slot="icon" src="./js/home/images/book.png">
                <span slot="label">订单</span>
            </tabbar-item>
            <tabbar-item  show-dot  link="/component/demo">
                <img slot="icon" src="./js/home/images/my.png">
                <span slot="label">我的</span>
            </tabbar-item>
        </tabbar>
    </keep-alive>
</div>


<script type="text/javascript" src="https://api.map.baidu.com/api?v=2.0&ak=QDUfMKo8APcODw5KAnnNMryb9P4rnwLh"></script>
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