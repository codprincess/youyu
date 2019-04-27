<?php

namespace App\Http\Controllers\Admin;

use App\Traits\Msg;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class UploadController extends Controller
{
    public function uploadImg(Request $request)
    {
        $file = $request->file('file');
        if($file->isValid()){
            $path = $file->store(date('ymd'));
            return [
                'code'=>0,
                'url'=>asset('/upload/'.$path)
            ];
        }
//        if($request->isMethod('POST')){
//            $file = $request->file('file');
//            if($file->isValid()){
//                //获取文件扩展名
//                $ext = $file->getClientOriginalExtension();
//                //获取文件的绝对路径
//                $path = $file->getRealPath();
//                //定义文件名
//                $filename = date('Y-m-d-h-i-s').'.'.$ext;
//               // $res =
//                    Storage::disk('public')->put($filename,file_get_contents($path));
//                if($res){
//                    $data = [
//                        'code'=>0,
//                        'msg'=>'上传成功啦',
//                        'data'=>$filename,
//                        'url'=>$res->$res->downloadUrl($filename)
//                    ];
//                }else{
//                    $data['data'] = $file->getErrorMessage();
//                }
//                return response()->json($data);
           // }


        //}
    }
}
