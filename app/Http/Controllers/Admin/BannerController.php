<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\BannerRequest;
use App\Models\Banner;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BannerController extends Controller
{
    public function index()
    {
        return view('admin.banner.index');
    }

    public function create()
    {
        return view('admin.banner.create');
    }


    public function store(BannerRequest $request)
    {
        $data = $request->only([ 'name','redirect_uri','picture_uri']);
        if(Banner::create($data)){
            return redirect(route('admin.banners'))->with(['status'=>'添加成功啦']);
        }
        return redirect(route('admin.banners'))->withErrors(['status'=>'添加失败啦']);
    }

    public function edit($id)
    {
        $bannerList = Banner::findOrFail($id);
        if(!$bannerList){
            return redirect(route('admin.banners'))->withErrors(['status'=>'哎呀，图片不存在']);
        }
        return view('admin.banner.edit',compact('bannerList'));
    }

    public function update(BannerRequest $request,$id)
    {
        $bannerList = Banner::findOrFail($id);
        $data = $request->only([ 'name','redirect_uri','picture_uri']);
        if($bannerList->update($data)){
            return redirect(route('admin.banners'))->with(['status'=>'图片更新成功']);
        }
        return redirect(route('admin.banners'))->withErrors(['status'=>'哎呀，更新失败了']);
    }

    public function destroy(Request $request)
    {
        $ids = $request->get('ids');
        if(!empty($ids)){
            return response()->json(['code'=>1,'msg'=>'请选择删除项']);
        }

        if(Banner::destroy($ids)){
            return  response()->json(['code'=>1,'msg'=>'删除成功啦']);
        }
        return response()->json(['code'=>1,'msg'=>'删除失败']);
    }

    public function data(Request $request)
    {
        $model = Banner::query();
        if($request->get('name')){
            $model = $model->where('name','like','%'.$request->get('name').'%');
        }
        $res = $model->orderBy('created_at','desc')->paginate($request->get('limit',4))->toArray();

        $data = [
            'code'=>0,
            'msg'=>'正在请求中...',
            'count'=>$res['total'],
            'data'=>$res['data']
        ];

        return response()->json($data);
    }






}
