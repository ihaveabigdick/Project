<?php

namespace App\Http\Controllers\api;

use App\model\Fcm;
use App\Share\FCMPublish;
use App\Share\ResponseModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ServiceController extends Controller
{
    //

    function toFcm($fccId,$notification){

        $token= [];
        $fcc = new Fcm();

        $data = $fcc
            ->where('fcms.id',$fccId)
            ->select('fcms.fcmToken')
            ->get();

        foreach ($data as $raw)
        {
            if($raw->fcmToken!=null)
                array_push($token,$raw->fcmToken);
        }
        if(count($token)==0)return false;
        $fcm = new FCMPublish();
        $fcm->publish($token,$notification);
        return true;

    }



}
