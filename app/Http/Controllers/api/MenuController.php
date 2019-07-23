<?php

namespace App\Http\Controllers\api;

use App\model\Menu;
use App\Share\Pagination\BasePagination;
use App\Share\Pagination\Pagination;
use App\Share\ResponseModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MenuController extends Controller
{
    //
    function create(Request $request){

        $menuModel = new Menu();

        $menuModel->restaurantId = $request->get('restaurantId');
        $menuModel->menuType = $request->get('menuType');
        $menuModel->name = $request->get('name');
        $menuModel->price = $request->get('price');
        $menuModel->msg = $request->get('msg');
        $menuModel->fileUploadId = $request->get('fileUploadId');
        $menuModel->save();

        return ResponseModel::onSuccess($menuModel);

    }


    function getAll(Request $request){
        $basePagination = new BasePagination($request);



        $menuModel = new Menu();
        $menuModel = $menuModel
            ->offset($basePagination->perPage*$basePagination->currentPage)
            ->limit($basePagination->perPage)
            ->where('menus.isDelete',false)
            ->join('menu_groups','menu_groups.id','menuType')
            ->join('restaurants','restaurants.id','restaurantId')

            ->select(
                'menus.id',
                'menus.id',
                'restaurants.name as restaurantId',
                'menu_groups.type as menuType',
                'menus.name',
                'menus.price',
                'menus.msg'
            );
//        if($request->get('menuType')!=null)
//            $menuModel=$menuModel->where('menuType',$request->get('menuType'));

        return json_encode(ResponseModel::onSuccessWithPage($menuModel->get(),new Pagination($request,$menuModel->count())),JSON_UNESCAPED_UNICODE);

    }

    function update(Request $request, $id){
        if ($id == null)
            return ResponseModel::onFail();
        $menuModel = new Menu();
        $menuModel = $menuModel
            ->where('id',$id)
            ->first();

        $menuModel->name=$request->get('name',$menuModel->name);
        $menuModel->price=$request->get('price',$menuModel->price);
        $menuModel->menuType=$request->get('menuType',$menuModel->menuType);
        $menuModel->msg=$request->get('msg',$menuModel->msg);
        $menuModel->save();
        return ResponseModel::onSuccess($menuModel);
    }

    function Delete(Request $request, $id){
        if ($id == null)
            return ResponseModel::onFail('刪除失敗');

        $menuModel = new Menu();
        $menuModel = $menuModel
            ->where('menus.id', $id)
            ->first();

        $menuModel->isDelete= 1;
        $menuModel->save();
        return ResponseModel::onSuccess($menuModel,'刪除成功');
    }

}
