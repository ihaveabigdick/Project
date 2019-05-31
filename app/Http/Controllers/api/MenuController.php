<?php

namespace App\Http\Controllers\api;

use App\model\Menu;
use App\Share\ResponseModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MenuController extends Controller
{
    //
    function create(Request $request){

        $menumodel = new Menu();

        $menumodel->restaurantId = $request->get('restaurantId');
        $menumodel->menuType = $request->get('menuType');
        $menumodel->name = $request->get('name');
        $menumodel->price = $request->get('price');
        $menumodel->msg = $request->get('msg');
        $menumodel->fileUploadId = $request->get('fileUploadId');
        $menumodel->save();

        return ResponseModel::onSuccess($menumodel);

    }


}
