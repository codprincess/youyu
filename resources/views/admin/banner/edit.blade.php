@extends('admin.base')

@section('content')
    <div class="layui-card">
        <div class="layui-card-header layuiadmin-card-header-auto">
            <h2>更新场馆</h2>
        </div>
        <div class="layui-card-body">
            <form class="layui-form" action="{{route('admin.banners.update',['id'=>$bannerList->id])}}" method="post">
                {{ method_field('put') }}
                @include('admin.banner._form')
            </form>
        </div>
    </div>
@endsection


