<?php

namespace App\Http\Controllers\api;

use App\Share\Pagination\Pagination;
use DB;
use App\model\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Share\ResponseModel;

class UserController extends Controller
{





    function getAll(Request $request){
        //region sql
        $userModel = new User();

        $data=$userModel
            ->where('name','like','%'.$request->get('name').'%')
            ->select(
                'id',
                'name',
                'phone',
                'email'
            );
//        dd($data->get());
//            ->where('isDelete','<>',true);
        //endregion
        return ResponseModel::onSuccessWithPage($data->get(),new Pagination($request,$data->count()));
    }


    function create(Request $request){
        //驗證帳號是否已被註冊
        $userModel = new User();
        //儲存使用者資訊
        $userModel->account=$request->get('account');
        $userModel->password=$request->get('password');
        $userModel->name=$request->get('name');
        $userModel->sex=$request->get('sex');
        $userModel->email=$request->get('email');
        $userModel->phone=$request->get('phone');
        $userModel->token=$request->get('token');
//        $userModel->fileUploadId=$request->get('fileUploadId');
        $userModel->save();
        return ResponseModel::onSuccess($userModel);
    }
    //

    function get(Request $request,$id=null){
        $userModel = new User();

        $data = $userModel
            ->where('users.id', $id)//條件式當id = id
            ->select(
                'users.id',
                'users.account',
                'users.name',
                'users.sex',
                'users.email',
                'users.phone',
                'users.token'
            )
            ->first();
        return $data;

    }


    function update(Request $request,$id=null){
        if ($id == null)
            return ResponseModel::onFail('請輸入資料');
        //驗證使用者
        $noticeboardModel = new User();
        $data=$noticeboardModel
            ->where('id',$id);

        if($data->count() == 0) return '輸入啊婊子';
        if($request->has('newPassword') &&
            $data->where('password',$request->get('password'))->count() == 0) return '找不到拉幹';
        $oldData=$data->first();

        //修改使用者資訊
        $data->update([
            'name' => $request->get('name',$oldData->name),
            'email' => $request->get('email',$oldData->email),
            'phone' => $request->get('phone',$oldData->phone),
            'sex' => $request->get('sex',$oldData->sex),
            'token' => $request->get('token',$oldData->token),
//            'fileUploadId' => $request->get('fileUploadId',$oldData->fileUploadId)
        ]);

        return '更新成功';
    }


}
