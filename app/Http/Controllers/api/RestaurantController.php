<?php

namespace App\Http\Controllers\api;

use App\model\Restaurant;
use App\Model\RestaurantModel;
use App\Share\ResponseModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RestaurantController extends Controller
{
    //
    function create(Request $request){

        $restaurantModel = new Restaurant();

        $restaurantModel -> name = $request ->get('name');
        $restaurantModel -> owner = $request ->get('owner');
        $restaurantModel -> address = $request->get('address');
        $restaurantModel -> phone = $request->get('phone');
        $restaurantModel -> msg = $request->get('msg');
        $restaurantModel -> fileUploadId = $request->get('fileUploadId');
//        $restaurantModel -> IsDelete = $request->get('IsDelete');
        $restaurantModel ->save();

        return ResponseModel::onSuccess($restaurantModel);
    }
}
