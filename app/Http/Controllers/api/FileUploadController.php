<?php

namespace App\Http\Controllers\api;

use App\Model\FileUpload;
use App\model\User;
use App\Share\ResponseModel;
use function GuzzleHttp\Psr7\uri_for;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use mysql_xdevapi\Session;
use PhpParser\Node\Expr\New_;

class FileUploadController extends Controller
{
    //
    function fileDown ($id){
        $fileModel =new FileUpload();
        $file=$fileModel->where('realName',$id)->first();
        return response()->download($file->path ,$file->uploadName);
    }

    function fileUpload(Request $request){


        if ($request->hasFile('file')) {
            $file = $request->file('file');  //獲取UploadFile例項
            if ( $file->isValid()) { //判斷檔案是否有效
                $fileModel = new FileUpload();

                $filename = $file->getClientOriginalName(); //檔案原名稱
                $extension = $file->getClientOriginalExtension(); //副檔名
                $filename = time() . "." . $extension;    //重新命名

                $fileModel->uploadName = $file->getClientOriginalName();
                $fileModel->uploadType = $file->getClientOriginalExtension();
                $fileModel->realName = $filename;
                $fileModel->path = public_path('img').$filename;
                $fileModel->save();



                $file->move(public_path('/img'), $filename); //移動至指定目錄
                return "shenboyyy1";
            }
        }
//        $file = $request->file();
//        $fileModel = new FileUpload();
//
//
//
//        $fileModel->uploadName = $file[0]->getClientOriginalName(); //檔案原名稱
//        $fileModel->uploadType = $file->getClientOriginalExtension(); //副檔名
//        $filename = time() . "." ;    //重新命名
//
//        $path = $request->file('photo')->move(public_path('/img'),$filename);
//        $photoUrl = url('/'.$filename);
//        return response()->json(['url'=>$photoUrl],200);



    }

    function fileUploadBase64(Request $request){

        $usermodel = New User();
        $fupmodel = New FileUpload();
        $UID = $request->session()->get('UID','2');
        $fileName = $usermodel
            ->where('id' , $UID)
            ->pluck('name')
            ->first();



        if($request->photo){
            $name = time().'.' . explode('/', explode(':', substr($request->photo, 0, strpos($request->photo, ';')))[1])[1];
            $path = public_path($fileName);
            if (!file_exists($path)) {
                mkdir($path, 0777, true);
            }
            \Image::make($request->photo)->save(public_path($path.'/'.$name));



//
            $fupmodel->uid = $UID;
            $fupmodel->realName = $name;
            $fupmodel->path = $path.'/'.$name;
            $fupmodel->save();

            $FID = $fupmodel->id;
            $data = $usermodel
                ->where('id' , $UID );

            $data->update([
                'fileUploadId' => $FID
            ]);
        }



    }

}
