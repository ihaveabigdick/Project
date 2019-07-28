<?php

namespace App\Http\Controllers\api;

use App\model\test;
use App\Share\ResponseModel;
use Illuminate\Support\Facades\Input;
use Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class testController extends Controller
{
    //
    function create (Request $request){

        $validator = Validator::make($request->all(),[
            'name'=> 'required',
        ]);
        if($validator->fails())
            return ResponseModel::onFail('資料異常',ResponseModel::$DEFECT,$validator->errors());

        $testmodel = new test();
        $testmodel->name = $request->get('name');
        $testmodel->save();
        return ResponseModel::onSuccess($testmodel);



    }



    function Array(Request $request)
    {
//        $tt = new test();
//
////        dd($posts);
//        $tt->name = $request['name'];
//        $tt->save();

        $test = json_decode($request->getContent(), true);
        dd($test);

        foreach($request['group'] as $id) {
            $newId = new test();
            $newId->name = $id;
            $newId->save();
//            unset($newId);
        }
        return ResponseModel::onSuccess($newId);

    }

}
