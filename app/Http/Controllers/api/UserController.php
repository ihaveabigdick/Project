<?php

namespace App\Http\Controllers\api;

use App\Share\Pagination\Pagination;
use DB;
use App\model\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Share\ResponseModel;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use phpDocumentor\Reflection\Location;
use Validator;

class UserController extends Controller
{


    function login(Request $request)
    {
        //驗證器
        $validator = Validator::make($request->all(), [
            'account' => 'required',
            'password' => 'required',
        ]);
        if ($validator->fails())
            return ResponseModel::onFail('資料異常', ResponseModel::$DEFECT, $validator->errors());

        //取得資料
        $userModel = new User();
        $user = $userModel
            ->where('account', $request->get('account'))
            ->where('password', $request->get('password'))
            ->first();

        //找不到使用者
        if ($user == null)
            return ResponseModel::onFail('登入失敗', ResponseModel::$NO_SEARCH);
        return ResponseModel::onSuccess(['id' => $user->id, 'authSystemId' => $user->authSystemId]);
    }


    function getAll(Request $request)
    {
        //region sql
        $userModel = new User();

        $data = $userModel
            ->where('name', 'like', '%' . $request->get('name') . '%')
            ->select(
                'id',
                'name',
                'phone',
                'email',
                'birthday'
            );
//        dd($data->get());
//            ->where('isDelete','<>',true);
        //endregion
        return ResponseModel::onSuccessWithPage($data->get(), new Pagination($request, $data->count()));
    }


    function create(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'account' => 'required',
            'password' => 'required',
            'name' => 'required',
        ]);
        if ($validator->fails())
            return ResponseModel::onFail('資料異常', ResponseModel::$DEFECT, $validator->errors());
        $ps = $request->get('password');
        $psc = $request->get('password_check');
        $userModel = new User();


        $flage = $userModel
            ->where('account', $request->get('account'))
            ->first() == null ? true : false;
        if (!$flage)
            return redirect()->back()->with(Session::put('error', '此帳號已被註冊過'));


        $checkName = $request->get('name');

        $username = $userModel
            ->where('name', $checkName)
            ->first();

        $userCount = $userModel
            ->where('name', 'like', $checkName . '%')
            ->select('name')
            ->count();


        if ($ps == $psc) {
            if ($username == null) {
                //驗證帳號是否已被註冊
                //儲存使用者資訊
                $userModel->account = $request->get('account');
                $userModel->password = $request->get('password');
                $userModel->name = $request->get('name');
                $sex = $request->get('sex');
                if ($sex == 'male')
                    $userModel->sex = 1;
                else
                    $userModel->sex = 2;
                $userModel->birthday = $request->get('birthday');
                $userModel->email = $request->get('email');
                $userModel->phone = $request->get('phone');
                $userModel->token = $request->get('token');
                //        $userModel->fileUploadId=$request->get('fileUploadId');
                $userModel->save();
                $id = $userModel->id;

                Session::flush();

                return \redirect()->intended('/photo')->with(Session::put('UID', $id));
            } else {
                $userModel->account = $request->get('account');
                $userModel->password = $request->get('password');
                $userModel->name = $checkName . $userCount;
                $sex = $request->get('sex');
                if ($sex == 'male')
                    $userModel->sex = 1;
                else
                    $userModel->sex = 2;
                $userModel->birthday = $request->get('birthday');
                $userModel->email = $request->get('email');
                $userModel->phone = $request->get('phone');
                $userModel->token = $request->get('token');
                //        $userModel->fileUploadId=$request->get('fileUploadId');
                $userModel->save();
                $id = $userModel->id;

                Session::flush();

                return \redirect()->intended('/photo')->with(Session::put('UID', $id));
            }
        } else
            return redirect()->back()->with(Session::put('error', '密碼輸入不一致'));

    }

    //

    function get($id)
    {
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


    function update(Request $request, $id = null)
    {
        if ($id == null)
            return ResponseModel::onFail('請輸入資料');
        //驗證使用者
        $noticeboardModel = new User();
        $data = $noticeboardModel
            ->where('id', $id);

        if ($data->count() == 0) return '輸入啊婊子';
        if ($request->has('newPassword') &&
            $data->where('password', $request->get('password'))->count() == 0) return '找不到拉幹';
        $oldData = $data->first();

        //修改使用者資訊
        $data->update([
            'name' => $request->get('name', $oldData->name),
            'email' => $request->get('email', $oldData->email),
            'phone' => $request->get('phone', $oldData->phone),
            'sex' => $request->get('sex', $oldData->sex),
            'token' => $request->get('token', $oldData->token),
//            'fileUploadId' => $request->get('fileUploadId',$oldData->fileUploadId)
        ]);

        return '更新成功';
    }


}
