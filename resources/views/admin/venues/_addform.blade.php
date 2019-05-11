{{csrf_field()}}
<div class="layui-form-item">
    <input type="hidden" name="venue_id" value="{{$venue_id}}">
    <div class="layui-inline">
        <label class="layui-form-label">日期</label>
        <div class="layui-input-inline">
            <input type="text" class="layui-input" id="venueTimeDate" name="date">
        </div>
    </div>
</div>
<div class="layui-form-item">
    <div class="layui-inline">
        <label class="layui-form-label">时段范围</label>
        <div class="layui-input-inline">
            <input type="text" class="layui-input" id="test9" name="hour" placeholder="-">
        </div>
    </div>
</div>
<div class="layui-form-item">
    <label for="" class="layui-form-label">单价</label>
    <div class="layui-input-block">
        <input style="width: 40%" type="number" name="score" value="" lay-verify="required" placeholder="请输入单价"
               class="layui-input">
    </div>
</div>


<div class="layui-form-item">
    <div class="layui-input-block">
        <button type="submit" class="layui-btn" lay-submit="" lay-filter="formDemo">确 认</button>
        <a class="layui-btn" href="{{route('admin.venues')}}">返 回</a>
    </div>
</div>
@section('app-js')
    <script src="/static/admin/layuiadmin/layui/laydate.js"></script>
    <script>
        layui.use('laydate', function () {
            var laydate = layui.laydate;
            //日期范围
            laydate.render({
                elem: '#venueTimeDate'
            });

            //时间范围
            laydate.render({
                elem: '#test9'
                , type: 'time'
                , range: true
            });

        });
    </script>
@endsection




