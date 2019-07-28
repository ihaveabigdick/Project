<?php

namespace App\Http\Controllers\api;

use App\Model\FileUpload;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FileUploadController extends Controller
{
    //
    function fileDown ($id){
        $fileModel =new FileUpload();
        $file=$fileModel->where('realName',$id)->first();
        return response()->download($file->path ,$file->uploadName);
    }

    function fileUpload(Request $request){

        //後臺程式碼
        if ($request->hasFile('file1')) {
            $file = $request->file('file1');  //獲取UploadFile例項
            if ( $file->isValid()) { //判斷檔案是否有效
                //$filename = $file->getClientOriginalName(); //檔案原名稱
                $extension = $file->getClientOriginalExtension(); //副檔名
                $filename = time() . "." . $extension;    //重新命名
                $file->move('C:\xampp\htdocs\project\public\img', $filename); //移動至指定目錄
            }
        }

    }
}
