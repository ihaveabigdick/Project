<?php

namespace App\Http\Controllers\api;

use App\model\Menu;
use App\model\Restaurant;
use App\Model\RestaurantModel;
use App\Share\Pagination\BasePagination;
use App\Share\Pagination\Pagination;
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

    function getAll(Request $request){
        $basePagination = new BasePagination($request);

        $restaurantModel = new Restaurant();
        $restaurantModel = $restaurantModel
            ->offset($basePagination->perPage*$basePagination->currentPage)
            ->limit($basePagination->perPage)
            ->where('restaurants.isDelete',false)
            ->select(
                'restaurants.id',
                'restaurants.name',
                'restaurants.owner',
                'restaurants.address',
                'restaurants.phone',
                'restaurants.msg',
             'restaurants.fileUploadId'
            );
        return ResponseModel::onSuccessWithPage($restaurantModel->get(),new Pagination($request,$restaurantModel->count()));
    }

    function update(Request $request,$id){
        if ($id == null)
            return ResponseModel::onFail('找不到該筆資料');
        $restaurantModel = new Restaurant();
        $restaurantModel = $restaurantModel
            ->where('id',$id)
            ->first();
        $restaurantModel->name=$request->get('name',$restaurantModel->name);
        $restaurantModel->owner=$request->get('owner',$restaurantModel->owner);
        $restaurantModel->address=$request->get('address',$restaurantModel->address);
        $restaurantModel->phone=$request->get('phone',$restaurantModel->phone);
        $restaurantModel->msg=$request->get('msg',$restaurantModel->msg);
        $restaurantModel->fileUploadId=$request->get('fileUploadId',$restaurantModel->fileUploadId);
        $restaurantModel->save();
        return ResponseModel::onSuccess($restaurantModel);
    }
    function Delete($id=null){
        if ($id == null)
            return ResponseModel::onFail('刪除失敗');

        $restaurantModel = new Restaurant();
        $restaurantModel = $restaurantModel
            ->where('id',$id)
            ->first();

        $restaurantModel->isDelete= 1;
        $restaurantModel->save();
        return ResponseModel::onSuccess('刪除成功');
    }
}
