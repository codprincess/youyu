{{csrf_field()}}
<div class="layui-form-item">
    <label for="" class="layui-form-label">图片名称</label>
    <div class="layui-input-block">
        <input style="width: 60%" type="text" name="name" value="{{$bannerList->name??old('name')}}" lay-verify="required" placeholder="请输入标题" class="layui-input" >
    </div>
</div>

<div class="layui-form-item">
    <label for="" class="layui-form-label">图片链接</label>
    <div class="layui-input-block">
        <input style="width: 60%" type="text" name="redirect_uri" value="{{$bannerList->redirect_uri??old('redirect_uri')}}" lay-verify="required" placeholder="请输入图片链接" class="layui-input" >
    </div>
</div>

{{--<div class="layui-form-item">--}}
    {{--<label for="" class="layui-form-label">缩略图</label>--}}
    {{--<div class="layui-input-block">--}}
        {{--<div class="layui-upload">--}}
            {{--<button type="button" class="layui-btn" id="uploadPic"><i class="layui-icon">&#xe67c;</i>图片上传</button>--}}
            {{--<div class="layui-upload-list" >--}}
                {{--<ul id="layui-upload-box" class="layui-clear">--}}
                    {{--@if(isset($venueList->cover_uri))--}}
                        {{--<li><img src="" /><p>上传成功</p></li>--}}
                    {{--@endif--}}
                {{--</ul>--}}
                {{--<input type="hidden" name="picture_uri" id="thumb" value="">--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
{{--</div>--}}

<div class="layui-form-item">
    <label for="" class="layui-form-label">缩略图</label>
    <div class="layui-input-block">
        <div class="layui-upload">
            <button type="button" class="layui-btn" id="uploadPic"><i class="layui-icon">&#xe67c;</i>图片上传</button>
            <div class="layui-upload-list" >
                <ul id="layui-upload-box" class="layui-clear">
                    @if(isset($bannerList->picture_uri))
                        <li><img src="{{$bannerList->picture_uri}}" /><p>上传成功</p></li>
                    @endif
                </ul>
                <input type="hidden" name="picture_uri" id="thumb" value="{{ $bannerList->picture_uri??'' }}">
            </div>
        </div>
    </div>
</div>
<div class="layui-form-item">
    <div class="layui-input-block">
        <button type="submit" class="layui-btn" lay-submit="" lay-filter="formDemo">确 认</button>
        <a  class="layui-btn" href="{{route('admin.banners')}}" >返 回</a>
    </div>
</div>




