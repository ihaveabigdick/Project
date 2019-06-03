<?php

namespace App\Http\Controllers\api;

use App\model\Restaurant;
use App\model\RestaurantWorker;
use App\Share\Pagination\BasePagination;
use App\Share\Pagination\Pagination;
use App\Share\ResponseModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RestaurantWorkerController extends Controller
{
    //
    function create(Request $request){

        $restaurantWorker = new RestaurantWorker();

        $restaurantWorker->restaurantId = $request->get('restaurantId');
        $restaurantWorker->systemId = $request->get('systemId');
        $restaurantWorker->account = $request->get('account');
        $restaurantWorker->password = $request->get('password');
        $restaurantWorker->name = $request->get('name');
        $restaurantWorker->sid = $request->get('sid');
        $restaurantWorker->sex = $request->get('sex');
        $restaurantWorker->email = $request->get('email');
        $restaurantWorker->phone = $request->get('phone');
        $restaurantWorker->save();

        return ResponseModel::onSuccess($restaurantWorker);

    }

    function getAll(Request $request){
        $basePagination =new BasePagination($request);

        $restaurantWorker = new RestaurantWorker();
        $restaurantWorker = $restaurantWorker
            ->offset($basePagination->perPage*$basePagination->currentPage)
            ->limit($basePagination->perPage)
            ->where('restaurant_workers.isDelete',false)
            ->join('restaurants','restaurants.id','restaurantId')
            ->join('systems','systems.id','systemId')
            ->join('sexes','sexes.id','sex')
            ->select(
                'restaurant_workers.id',
                'restaurants.name as restaurantId',
                'systems.name as systemId',
                'restaurant_workers.account',
                'restaurant_workers.password',
                'restaurant_workers.sid',
                'sexes.name as sex',
                'restaurant_workers.email',
                'restaurant_workers.phone'
            );
        return ResponseModel::onSuccessWithPage($restaurantWorker->get(),new Pagination($request,$restaurantWorker->count()));
    }

    function update(Request $request, $id){
        if ($id == null)
            return ResponseModel::onFail('請輸入資料');
        //驗證使用者
        $restaurantWorker = new RestaurantWorker();
        $restaurantWorker = $restaurantWorker
            ->where('id',$id)
            ->first();

        $restaurantWorker->restaurantId = $request->get('restaurantId',$restaurantWorker->restaurantId);
        $restaurantWorker->systemId = $request->get('systemId',$restaurantWorker->systemId);
        $restaurantWorker->account = $request->get('account',$restaurantWorker->account);
        $restaurantWorker->password = $request->get('password',$restaurantWorker->systemId);
        $restaurantWorker->name = $request->get('name',$restaurantWorker->name);
        $restaurantWorker->sid = $request->get('sid',$restaurantWorker->sid);
        $restaurantWorker->sex = $request->get('sex',$restaurantWorker->sex);
        $restaurantWorker->email = $request->get('email',$restaurantWorker->email);
        $restaurantWorker->phone = $request->get('phone',$restaurantWorker->phone);
        $restaurantWorker->save();
        return ResponseModel::onSuccess($restaurantWorker);

    }
    function Delete($id=null){
        if ($id == null)
            return ResponseModel::onFail('刪除失敗');

        $restaurantWorker = new Restaurant();
        $restaurantWorker = $restaurantWorker
            ->where('id',$id)
            ->first();

        $restaurantWorker->isDelete= 1;
        $restaurantWorker->save();
        return ResponseModel::onSuccess('刪除成功');
    }
}
