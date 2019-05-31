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
            ->select(
                'menus.restaurantId',
                'menus.menuType',
                'menus.name',
                'menus.price',
                'menus.msg'
            );
        if($request->get('menuType')!=null)
            $menuModel=$menuModel->where('menuType',$request->get('menuType'));

        return ResponseModel::onSuccessWithPage($menuModel->get(),new Pagination($request,$menuModel->count()));

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

}
