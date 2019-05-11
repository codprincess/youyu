@extends('admin.base')

@section('content')
    <div class="layui-card">
        <div class="layui-card-header layuiadmin-card-header-auto">
            <h2>添加场次</h2>
        </div>
        <div class="layui-card-body">
            <form class="layui-form"  method="post" action="{{route('admin.venuesTime.store')}}" >
                @include('admin.venues._addform')
            </form>
        </div>
    </div>

@endsection








