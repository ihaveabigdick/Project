<?php

namespace App\Http\Controllers\api;

use App\model\Order;
use App\Share\ResponseModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderControll extends Controller
{
    //
    function create(Request $request){

        $order = new Order();

        $order->userId = $request->get('userid');
        $order->total = $request->get('total');
        $order->status = $request->get('status');
        $order->remarks = $request->get('remarks');
        $order->save();

        return ResponseModel::onSuccess($order);

    }


}
