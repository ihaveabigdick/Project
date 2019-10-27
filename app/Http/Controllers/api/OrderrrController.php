<?php

namespace App\Http\Controllers\api;

use App\model\orderrs;
use App\Share\ResponseModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderrrController extends Controller
{
    //
    function create(Request $request){

        $order = new orderrs();

        $order->mealName = $request->get('mealName');
        $order->count = $request->get('count');
        $order->remark = $request->get('remark');
        $order->status = $request->get('status');
        $order->userId = $request->get('userId');
        $order->save();

        return ResponseModel::onSuccess($order);

    }
}
