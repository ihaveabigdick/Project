<?php

namespace App\Http\Controllers\api;

use App\Model\FileUpload;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FileUploadController extends Controller
{
    //
    function file ($id){
        $fileModel =new FileUpload();
        $file=$fileModel->where('realName',$id)->first();
        return response()->download($file->path ,$file->uploadName);
    }
}
