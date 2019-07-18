<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;
use LaravelFCM\Message\OptionsBuilder;
use LaravelFCM\Message\PayloadDataBuilder;
use LaravelFCM\Message\PayloadNotificationBuilder;
use FCM;

class Notification extends Model
{
    //
    public static function toSingleDevice($model,$id,$title=null,$body=null){

        $optionBuilder = new OptionsBuilder();
        $optionBuilder->setTimeToLive(60*20);

        $notificationBuilder = new PayloadNotificationBuilder($title);
        $notificationBuilder->setBody($body)
            ->setSound('default');

        $dataBuilder = new PayloadDataBuilder();

        $option = $optionBuilder->build();
        $notification = $notificationBuilder->build();
        $data = $dataBuilder->build();

        $token = $model
            ->where('id',$id)
            ->select('fcmToken')
            ->toArray();

        $downstreamResponse = FCM::sendTo($token, $option, $notification, $data);

        $downstreamResponse->numberSuccess();
        $downstreamResponse->numberFailure();
        $downstreamResponse->numberModification();

//return Array - you must remove all this tokens in your database
        $downstreamResponse->tokensToDelete();

//return Array (key : oldToken, value : new token - you must change the token in your database )
        $downstreamResponse->tokensToModify();

//return Array - you should try to resend the message to the tokens in the array
        $downstreamResponse->tokensToRetry();

// return Array (key:token, value:errror) - in production you should remove from your database the tokens

    }


    public static function toMultipleDevice($model,$title=null,$body=null){

        $optionBuilder = new OptionsBuilder();
        $optionBuilder->setTimeToLive(60*20);

        $notificationBuilder = new PayloadNotificationBuilder($title);
        $notificationBuilder->setBody($body)
            ->setSound('default');

        $dataBuilder = new PayloadDataBuilder();
//        $dataBuilder->addData(['a_data' => 'my_data']);

        $option = $optionBuilder->build();
        $notification = $notificationBuilder->build();
        $data = $dataBuilder->build();

// You must change it to get your tokens
        $tokens = $model->pluck('fcmToken')->toArray();

        $downstreamResponse = FCM::sendTo($tokens, $option, $notification, $data);

        $downstreamResponse->numberSuccess();
        $downstreamResponse->numberFailure();
        $downstreamResponse->numberModification();

//return Array - you must remove all this tokens in your database
        $downstreamResponse->tokensToDelete();

//return Array (key : oldToken, value : new token - you must change the token in your database )
        $downstreamResponse->tokensToModify();

//return Array - you should try to resend the message to the tokens in the array
        $downstreamResponse->tokensToRetry();

// return Array (key:token, value:errror) - in production you should remove from your database the tokens present in this array
        $downstreamResponse->tokensWithError();

    }

}
