<?php

namespace App\Http\Controllers\api;

use App\model\orderrs;
use App\Share\ResponseModel;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderrrController extends Controller
{
    //
    function create(Request $request){

        $data = json_decode($request->getContent(),true);
        $insertData = [];
        foreach($data as $item){
            $item['created_at'] = Carbon::now();
            $item['updated_at'] = Carbon::now();
            array_push($insertData,$item);
        }
        Orderrs::insert($insertData);
        return ResponseModel::onSuccess($insertData);
    }
}
