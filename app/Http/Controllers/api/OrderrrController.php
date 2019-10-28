<?php

namespace App\Http\Controllers\api;

use App\model\orderrs;
use App\model\User;
use App\Share\ResponseModel;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderrrController extends Controller
{
    //
    function create(Request $request){
        $userModel = new User();

        $total = 0;
        $data = json_decode($request->getContent(),true);
        $insertData = [];
        foreach($data as $item){
            $item['created_at'] = Carbon::now();
            $item['updated_at'] = Carbon::now();
            $id = $item['userId'];
            $cc = $item['count'];
            $pp = $item['mealPrice'];
            $total += $cc*$pp;
            $odata = $userModel->where('id',$id)
                ->first();
            $odata->totalCost += $total;
            $odata->save();
            array_push($insertData,$item);
        }
        Orderrs::insert($insertData);
        return ResponseModel::onSuccess($insertData);
    }
}
