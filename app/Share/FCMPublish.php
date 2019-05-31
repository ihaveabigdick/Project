<?php
/**
 * Created by PhpStorm.
 * User: CYUT
 * Date: 2019/3/27
 * Time: 下午 08:46
 */

namespace App\Share;


use Http\Client\Exception\RequestException;
use Psr\Http\Message\ResponseInterface;

class FCMPublish
{

    protected  $token = '';
    private $client;
    function __construct() {


    }
    public function publish($token,$data,$serviceId,$onSuccess = null,$onFile = null){
        $notification = [
            'title' => 'foodway系統推播通知',
            'body' =>$data,
            'sound' => true,
            'click_action'=>'FCM_PLUGIN_ACTIVITY'
        ];

        $extraNotificationData = ["message" => $notification,"serviceId" =>$serviceId];
        $client = new \GuzzleHttp\Client(['headers' =>[
            'Authorization'=>'key=AIzaSyDYs2JTnTs0E4-uGJewsKgI-6tN9Pt7Cbk',
            'Content-Type'=>'application/json'
        ],
            'json' => [
                //'registration_ids' => $tokenList, //multple token array
                'registration_ids'        => $token, //single token
                'notification' => $notification,
                'data' => $extraNotificationData,
                "priority"=>"high"
            ]]);
        $request = new \GuzzleHttp\Psr7\Request('post', 'https://fcm.googleapis.com/fcm/send'
        );
        $promise = $client->sendAsync($request)->then(function ($response) {
            // echo 'I completed! ' . $response->getBody();
        });
        if($onSuccess!=null&&$onFile!=null){
            $promise->then(
                $onSuccess,
                $onFile
            );
            $promise->wait();
        }else{
            $promise->then(
                function (ResponseInterface $res) {
                    echo $res->getStatusCode() . "\n";
                },
                function (RequestException $e) {
                    echo $e->getMessage() . "\n";
                    echo $e->getRequest()->getMethod();
                }
            );
            $promise->wait();
        }


    }


}