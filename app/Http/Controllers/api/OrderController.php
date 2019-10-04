<?php

namespace App\Http\Controllers\api;

use App\model\Order;
use App\model\OrderInfo;
use App\Share\ResponseModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    //
    function create(Request $request){

        $order = new Order();

        $order->userId = $request->get('userId');
        $order->total = $request->get('total');
        $order->status = $request->get('status');
        $order->remarks = $request->get('remarks');
        $order->save();

        return ResponseModel::onSuccess($order);

    }

    function createInfo(Request $request){

        $orderInfo = new OrderInfo();

        $orderInfo->orderId = $request->get('orderId');
        $orderInfo->menuId = $request->get('menuId');
        $orderInfo->count = $request->get('count');

        $orderInfo->save();

        return ResponseModel::onSuccess($orderInfo);

    }

    function update(Request $request, $id)
    {
        if ($id == null)
            return ResponseModel::onFail('請輸入資料');
        //驗證使用者
        $order = new Order();
        $order = $order
            ->where('id', $id)
            ->first();

        $order->userId = $request->get('userId', $order->userId);
        $order->total = $request->get('total', $order->total);
        $order->status = $request->get('status', $order->status);
        $order->remarks = $request->get('remarks', $order->remarks);
        $order->save();
        return ResponseModel::onSuccess($order);
    }

    function finish (Request $request ,$id){

        if ($id == null)
            return ResponseModel::onFail(請輸入單號);
        $order = new Order();
        $order = $order
            ->where('id', $id)
            ->first();

        $order->status = '已結單';
        $order->save();

        return ResponseModel::onSuccess('單號'.$id.'已成功結單');


    }


}
