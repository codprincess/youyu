@extends('admin.base')

@section('content')
    <div class="layui-card">
        <div class="layui-card-header layuiadmin-card-header-auto">
            <div class="layui-btn-group ">
                     <a class="layui-btn layui-btn-sm" href="{{ route('admin.venues.create') }}">添 加</a>
                    <button class="layui-btn layui-btn-sm layui-btn-danger" id="listDelete">删 除</button>
                    {{--<a class="layui-btn layui-btn-sm" href="{{ route('admin.venuesTime.create') }}">添加场次</a>--}}

                <button class="layui-btn layui-btn-sm" id="searchBtn">搜 索</button>
            </div>
            <div class="layui-form" >
                <div class="layui-input-inline">
                    <input type="text" name="name" id="name" placeholder="请输入场馆名称" class="layui-input">
                </div>
            </div>
        </div>
        <div class="layui-card-body">
            <table id="dataTable" lay-filter="dataTable"></table>
            <script type="text/html" id="options">
                <div class="layui-btn-group">
                    <a class="layui-btn layui-btn-sm" href="{{ route('admin.venuesTime.create') }}">添加场次</a>
                        <a class="layui-btn layui-btn-sm" lay-event="edit">编辑</a>
                        <a class="layui-btn layui-btn-danger layui-btn-sm" lay-event="del">删除</a>
                </div>
            </script>
            <script type="text/html" id="thumb">
                <a href="@{{d.cover_uri}}" target="_blank" title="点击查看"><img src="@{{d.cover_uri}}" alt="" width="28" height="28"></a>
            </script>
            {{--<script type="text/html" id="tags">--}}
                {{--@{{#  layui.each(d.tags, function(index, item){ }}--}}
                {{--<button type="button" class="layui-btn layui-btn-sm">@{{ item.name }}</button>--}}
                {{--@{{# }); }}--}}
            {{--</script>--}}
            {{--<script type="text/html" id="category">--}}
                {{--@{{ d.category.name }}--}}
            {{--</script>--}}
        </div>
    </div>
@endsection

@section('script')

        <script>
            layui.use(['layer','table','form'],function () {
                var layer = layui.layer;
                var form = layui.form;
                var table = layui.table;
                //用户表格初始化
                var dataTable = table.render({
                    elem: '#dataTable'
                    ,height: 500
                    ,url: "{{ route('admin.venue.data') }}" //数据接口
                    ,page: true //开启分页
                    ,cols: [[ //表头
                        {checkbox: true,fixed: true}
                        ,{field: 'id', title: 'ID', sort: true,width:80}
                        ,{field: 'name', title: '名称',width:160}
                        ,{field: 'cover_uri', title: '缩略图',toolbar:'#thumb',width:100}
                        ,{field:'province', title:'地点', width:350, templet: function(res){
                            return  res.province + res.city + res.street +res.district
                        }}
                        ,{field: 'start_at', title: '开放时间' ,width: 220}
                        ,{field: 'end_at', title: '关闭时间', width: 220}
                        ,{fixed: 'right', width: 220, align:'center', toolbar: '#options'}
                    ]]
                });

                //监听工具条
                table.on('tool(dataTable)', function(obj){ //注：tool是工具条事件名，dataTable是table原始容器的属性 lay-filter="对应的值"
                    var data = obj.data //获得当前行数据
                        ,layEvent = obj.event; //获得 lay-event 对应的值
                    if(layEvent === 'del'){
                        layer.confirm('确认删除吗？', function(index){
                            $.post("{{ route('admin.venues.destroy') }}",{_method:'delete',ids:[data.id]},function (result) {
                                if (result.code==0){
                                    obj.del(); //删除对应行（tr）的DOM结构
                                }
                                layer.close(index);
                                layer.msg(result.msg)
                            });
                        });
                    } else if(layEvent === 'edit'){
                        location.href = '/admin/venues/'+data.id+'/edit';
                    }
                });

                {{--@can('zixun.article.edit')--}}
                //监听是否显示
                form.on('switch(isShow)', function(obj){
                    var index = layer.load();
                    var url = $(obj.elem).attr('url')
                    var data = {
                        "is_show" : obj.elem.checked==true?1:0,
                        "_method" : "put"
                    }
                    $.post(url,data,function (res) {
                        layer.close(index)
                        layer.msg(res.msg)
                    },'json');
                });
                {{--@endcan--}}

                //按钮批量删除
                $("#listDelete").click(function () {
                    var ids = []
                    var hasCheck = table.checkStatus('dataTable')
                    var hasCheckData = hasCheck.data
                    if (hasCheckData.length>0){
                        $.each(hasCheckData,function (index,element) {
                            ids.push(element.id)
                        })
                    }
                    if (ids.length>0){
                        layer.confirm('确认删除吗？', function(index){
                            $.post("{{ route('admin.venues.destroy') }}",{_method:'delete',ids:ids},function (result) {
                                if (result.code==0){
                                    dataTable.reload()
                                }
                                layer.close(index);
                                layer.msg(result.msg)
                            });
                        })
                    }else {
                        layer.msg('请选择删除项')
                    }
                })

                //搜索
                $("#searchBtn").click(function () {
                    //var catId = $("#category_id").val()
                    var name = $("#name").val();
                    dataTable.reload({
                        where:{name:name},
                        page:{curr:1}
                    })
                })
            })
        </script>

@endsection