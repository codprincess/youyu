@extends('admin.base')

@section('content')
    <div class="layui-card">
        <div class="layui-card-header  layuiadmin-card-header-auto">
            <h2>添加用户</h2>
        </div>
        <div class="layui-card-body"  style="margin-left: 25%;">
            <form class="layui-form" action="" method="post">
            @include('admin.user._form')
        </form>
        </div>
    </div>
@endsection

