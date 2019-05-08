@extends('admin.base')
@section('content')
    <div class="layui-card">
        <div class="layui-card-header layuiadmin-card-header-auto">
            <div class="layui-btn-group ">
                {{--@can('member.member.destroy')--}}
                    {{--<button class="layui-btn layui-btn-sm layui-btn-danger" id="listDelete">删除</button>--}}
                {{--@endcan--}}
                {{--@can('member.member.create')--}}
                    {{--<a class="layui-btn layui-btn-sm" href="{{ route('admin.member.create') }}">添加</a>--}}
                {{--@endcan--}}
                <button class="layui-btn layui-btn-sm" id="memberSearch">搜索</button>
            </div>
            <div class="layui-form">
                <div class="layui-input-inline">
                    <input type="text" name="order_no" id="order_no" placeholder="请输入订单号" class="layui-input">
                </div>

            </div>
        </div>
        <div class="layui-card-body">
            <table id="dataTable" lay-filter="dataTable"></table>
            <script type="text/html" id="options">
                <div class="layui-btn-group">

{{--                        <a class="layui-btn layui-btn-sm" lay-event="edit">编辑</a>--}}

                        <a class="layui-btn layui-btn-danger layui-btn-sm" lay-event="del">删除</a>

                </div>
            </script>
{{--            <script type="text/html" id="barDemo">--}}
{{--                {{# if (d.status=== '1') { }}--}}
{{--                   待付款--}}
{{--                {{# } else if(d.status=== '2') { }}--}}
{{--                    已支付--}}
{{--                {{# } else (d.status=== '3') { }}--}}
{{--                    已取消--}}
{{--                {{#  }); }}--}}
{{--            </script>--}}

        </div>
    </div>
@endsection

@section('script')
    {{--@can('member.member')--}}
        <script>
            layui.use(['layer','table','form'],function () {
                var layer = layui.layer;
                var form = layui.form;
                var table = layui.table;
                //用户表格初始化
                var dataTable = table.render({
                    elem: '#dataTable'
                    ,height: 500
                    ,url: "{{ route('admin.order.data') }}" //数据接口
                    ,where:{model:"order"}
                    ,page: true //开启分页
                    ,cols: [[ //表头
                        {checkbox: true,fixed: true}
                        ,{field: 'id', title: 'ID', sort: true,width:80}
                        ,{field: 'order_name', title: '场馆名称'}
                        ,{field: 'venue_time_ids', title: '场次'}
                        ,{field: 'order_no', title: '订单号'}
                        ,{field: 'total_amount', title: '总金额'}
                        ,{field: 'status', title: '支付状态',width:100,templet:function (res) {
                            if(res.status == '1'){
                                return  ' 待付款'
                            }else if (res.status == '2'){
                                return '已支付'
                            } else if(res.status == '3') {
                                return '已取消'
                            }
                        }}
                        ,{field: 'created_at', title: '创建时间'}
                        ,{field: 'updated_at', title: '更新时间'}
//                        ,{fixed: 'right', width: 120, align:'center', toolbar: '#options'}
                    ]]
                });

                {{--//监听工具条--}}
                {{--table.on('tool(dataTable)', function(obj){ //注：tool是工具条事件名，dataTable是table原始容器的属性 lay-filter="对应的值"--}}
                    {{--var data = obj.data //获得当前行数据--}}
                        {{--,layEvent = obj.event; //获得 lay-event 对应的值--}}
                    {{--if(layEvent === 'del'){--}}
                        {{--layer.confirm('确认删除吗？', function(index){--}}
                            {{--$.post("{{ route('admin.member.destroy') }}",{_method:'delete',ids:[data.id]},function (result) {--}}
                                {{--if (result.code==0){--}}
                                    {{--obj.del(); //删除对应行（tr）的DOM结构--}}
                                {{--}--}}
                                {{--layer.close(index);--}}
                                {{--layer.msg(result.msg)--}}
                            {{--});--}}
                        {{--});--}}
                    {{--} else if(layEvent === 'edit'){--}}
                        {{--location.href = '/admin/member/'+data.id+'/edit';--}}
                    {{--}--}}
                {{--});--}}

                //按钮批量删除
                {{--$("#listDelete").click(function () {--}}
                    {{--var ids = []--}}
                    {{--var hasCheck = table.checkStatus('dataTable')--}}
                    {{--var hasCheckData = hasCheck.data--}}
                    {{--if (hasCheckData.length>0){--}}
                        {{--$.each(hasCheckData,function (index,element) {--}}
                            {{--ids.push(element.id)--}}
                        {{--})--}}
                    {{--}--}}
                    {{--if (ids.length>0){--}}
                        {{--layer.confirm('确认删除吗？', function(index){--}}
                            {{--$.post("{{ route('admin.member.destroy') }}",{_method:'delete',ids:ids},function (result) {--}}
                                {{--if (result.code==0){--}}
                                    {{--dataTable.reload()--}}
                                {{--}--}}
                                {{--layer.close(index);--}}
                                {{--layer.msg(result.msg)--}}
                            {{--});--}}
                        {{--})--}}
                    {{--}else {--}}
                        {{--layer.msg('请选择删除项')--}}
                    {{--}--}}
                {{--})--}}
                //搜索
                $("#memberSearch").click(function () {
                   // var userSign = $("#user_sign").val();
                    var order_no = $("#order_no").val();
                    dataTable.reload({
                        where:{order_no:order_no},
                        page:{curr:1}
                    })
                })
            })
        </script>
    {{--@endcan--}}
@endsection



