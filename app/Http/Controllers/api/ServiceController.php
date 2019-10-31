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

    function toFcm(Request $request)
    {

        $fcmm = new Fcm();

        $checkToken = $fcmm
            ->where('id', $request->get('id'))
            ->select('fcmToken')
            ->first();
        if ($checkToken == null)
            return ResponseModel::onFail('無此裝置');


        $id = $request->get('id');
        $title = $request->get('title');
        $body = $request->get('body');
        $noti = new Notification();
        $noti->toSingleDevice($fcmm, $id, $title, $body);

        return ResponseModel::onSuccess('推播成功');

    }

    function toGroup(Request $request)
    {

        $fcmm = new Fcm();

        $title = $request->get('title');
        $body = $request->get('body');
        $noti = new Notification();

        $noti->toMultipleDevice($fcmm, $title, $body);

        return ResponseModel::onSuccess($body);

    }


}
