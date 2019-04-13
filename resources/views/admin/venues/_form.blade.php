{{csrf_field()}}
<div class="layui-form-item">
    <label for="" class="layui-form-label">场馆名称</label>
    <div class="layui-input-block">
        <input style="width: 60%" type="text" name="name" value="" lay-verify="required" placeholder="请输入标题" class="layui-input" >
    </div>
</div>
<div class="layui-form-item">
    <label for="" class="layui-form-label">所属省份</label>
    <div class="layui-input-block">
        <input style="width: 40%" type="text" name="province" value="" lay-verify="required" placeholder="请输入省份" class="layui-input" >
    </div>
</div>
<div class="layui-form-item">
    <label for="" class="layui-form-label">所属区县</label>
    <div class="layui-input-block">
        <input style="width: 40%" type="text" name="district" value="" lay-verify="required" placeholder="请输入区县" class="layui-input" >
    </div>
</div>

<div class="layui-form-item">
    <label for="" class="layui-form-label">所属城市</label>
    <div class="layui-input-block">
        <input style="width: 40%" type="text" name="city" value="" lay-verify="required" placeholder="请输入区县" class="layui-input" >
    </div>
</div>

<div class="layui-form-item">
    <label for="" class="layui-form-label">所属街道</label>
    <div class="layui-input-block">
        <input style="width: 40%" type="text" name="street" value="" lay-verify="required" placeholder="请输入街道" class="layui-input" >
    </div>
</div>

<div class="layui-form-item">
    <label for="" class="layui-form-label">场馆状态</label>
    <div class="layui-col-md">
        <input type="checkbox" name="status" lay-skin="switch" lay-text="On|OFF" value="1" checked=""><div class="layui-unselect layui-form-switch" lay-skin="_switch"><em>OFF</em><i></i></div>
    </div>
</div>


<div class="layui-form-item">
    <label for="" class="layui-form-label">场馆详情</label>
    <div class="layui-input-block">
        <textarea style="width: 60%" name="description" placeholder="请输入描述" class="layui-textarea"></textarea>
    </div>
</div>

{{--<div class="layui-form-item">--}}
    {{--<label for="" class="layui-form-label">场馆地址</label>--}}
    {{--<div class="layui-input-block">--}}
        {{--<input style="width: 60%" type="text" name="keywords" value="" lay-verify="required" placeholder="请输入关键词" class="layui-input" >--}}
    {{--</div>--}}
{{--</div>--}}

{{--<div class="layui-form-item">--}}
    {{--<label for="" class="layui-form-label">单价</label>--}}
    {{--<div class="layui-input-block">--}}
        {{--<input style="width: 60%" type="number" name="price" value="" lay-verify="required" placeholder="请输入单价"   class="layui-input" >--}}
    {{--</div>--}}
{{--</div>--}}
<div class="layui-form-item">
    <label for="" class="layui-form-label">场馆评分</label>
    <div class="layui-input-block">
        <input style="width: 40%" type="number" name="score" value="" lay-verify="required" placeholder="请输入评分"   class="layui-input" >
    </div>
</div>

{{--<div class="layui-form-item">--}}
    {{--<label for="" class="layui-form-label">场馆数量</label>--}}
    {{--<div class="layui-input-block">--}}
        {{--<input style="width: 60%" type="number" name="counts" value="" lay-verify="required" placeholder="请输入场馆数量"   class="layui-input" >--}}
    {{--</div>--}}
{{--</div>--}}

<div class="layui-form-item">
    <label for="" class="layui-form-label">开放时间</label>
    <div class="layui-inline">
        <input type="text" class="layui-input" id="test1" name="start_at">
    </div>
</div>

<div class="layui-form-item">
    <label for="" class="layui-form-label">关闭时间</label>
    <div class="layui-inline">
        <input type="text" class="layui-input" id="test1" name="end_at">
    </div>
</div>
<div class="layui-form-item">
    <label for="" class="layui-form-label">联系电话</label>
    <div class="layui-input-block">
        <input style="width: 40%" type="text" name="phone" value="" lay-verify="required" placeholder="请输入号码"   class="layui-input" >
    </div>
</div>

<div class="layui-form-item">
    <label for="" class="layui-form-label">缩略图</label>
    <div class="layui-input-block">
        <div class="layui-upload">
            <button type="button" class="layui-btn" id="uploadPic"><i class="layui-icon">&#xe67c;</i>图片上传</button>
            {{--<div class="layui-upload-list" >--}}
                {{--<ul id="layui-upload-box" class="layui-clear">--}}

                        {{--<li><img src="" /><p>上传成功</p></li>--}}

                {{--</ul>--}}
                {{--<input type="hidden" name="thumb" id="thumb" value="">--}}
            {{--</div>--}}
        </div>
    </div>
</div>

{{--@include('UEditor::head');--}}
{{--<div class="layui-form-item">--}}
    {{--<label for="" class="layui-form-label">内容</label>--}}
    {{--<div class="layui-input-block">--}}
        {{--<script id="container" name="content" type="text/plain">--}}
            {{--{!! $article->content??old('content') !!}--}}
        {{--</script>--}}
    {{--</div>--}}
{{--</div>--}}



<div class="layui-form-item">
    <div class="layui-input-block">
        <button type="submit" class="layui-btn" lay-submit="" lay-filter="formDemo">确 认</button>
        <a  class="layui-btn" href="{{route('admin.venues')}}" >返 回</a>
    </div>
</div>




