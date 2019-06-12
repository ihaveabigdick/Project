<?php
/**
 * Created by PhpStorm.
 * User: CYUT
 * Date: 2019/3/5
 * Time: 下午 05:21
 */

namespace App\Share;


use App\Share\Pagination\Pagination;

class ResponseModel
{
    /**
     * 重複、多餘.....
     */
    public static $REPEAT = 101; //資料重複
    /**
     * 成功
     */
    public static $OK = 200; //成功
    /**
     * 缺少、不足、不夠...
     */
    public static $UNKNOWN=400; //失敗原因不明
    public static $NO_PERMISSIONS = 404;//權限不足
    public static $DEFECT = 405; //缺少屬性
    public static $NO_SEARCH = 401;//找不到資訊


    public static  function onSuccess($data, string $msg='成功', int $code=200){
        return ['status'=>true,'data'=> $data,'msg'=>$msg,'code'=>$code];
    }

    public static function onSuccessWithPage($data,Pagination $pagination, string $msg='成功', int $code=200){
        return ['status'=>true,'data'=> $data,'pagination'=> $pagination,'msg'=>$msg,'code'=>$code];
    }

    public static  function onFail(string $msg='失敗',int $code=000,$error=null){
        return ['status'=>false,'code'=>$code,'msg'=>$msg,'error'=>$error];
    }
}