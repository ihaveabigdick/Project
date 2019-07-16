<?php

namespace App\Http\Controllers\api;

use App\model\Fcm;
use App\Share\ResponseModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FcmController extends Controller
{
    //
    function fcmupdate(Request $request){
        $fcm = new Fcm();
        $fcm->fcmToken = $request->get('fcmToken');
        $fcm->tid = $request->get('tid');
        $fcm->save();

        return ResponseModel::onSuccess($fcm);


    }
}
