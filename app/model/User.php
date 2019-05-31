<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;
//
///**
// * Class User
// * @package App\model
// *
// * @property int $id 主鍵
// * @property string $account 帳號
// * @property string $password 密碼
// * @property string $name 姓名
// * @property int $sex 性別
// * @property string $email 電子信箱
// * @property string $phone 電話
// * @property string $token 權限
// * @property int $fileUploadId 檔案id
// * @mixin \Eloquent
// */



class User extends Model
{
   protected $table = 'Users';

   protected $fillable = [
       'account',
       'password',
       'name',
   ];

}
