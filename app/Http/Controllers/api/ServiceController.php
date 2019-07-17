<?php

namespace App\Http\Controllers\api;

use App\model\Fcm;
use App\model\Notification;
use App\Share\FCMPublish;
use App\Share\ResponseModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use LaravelFCM\Message\OptionsBuilder;
use LaravelFCM\Message\PayloadDataBuilder;
use LaravelFCM\Message\PayloadNotificationBuilder;
use LaravelFCM\Facades\FCM as FCMAlias;

class ServiceController extends Controller
{
    //

    function toFcm(Request $request){

        $title = $request->get('title');
        $body = $request->get('body');
        $noti = new Notification();
        $token = 'drUpHh58o6M:APA91bHhQ_Umm7rURDb-zPBxdIQNnReluyX7ksgNo_M9CDmZNQAAQcbCwtb-bnKI28gzRyuvLigTxK9Acf41oX9m0DrEsXx6bB3s6Igx-2tAl_AmFQ-O3Mc_oaJ5MgbYhswzROhb0dcj';
        $noti->toSingleDevice($token,$title,$body);

    }

    function toGroup(Request $request){

        $fcmm = new Fcm();

        $title = $request->get('title');
        $body = $request->get('body');
        $noti = new Notification();

        $noti->toMultipleDevice($fcmm,$title,$body);


    }


}
