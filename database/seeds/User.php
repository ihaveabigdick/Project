<?php

use Illuminate\Database\Seeder;

class User extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        foreach (range(1,10)as $id)


        \App\model\User::create([
            'account' => 'aa'.$id,
            'password'=> 'bb',
            'name' => 'shenboyyy'.$id,
            'sex'=> 1,
            'email'=> 'gmail',
            'phone'=> '0800',
            'token'=>'sqqqq',
//            'fileUploadId'=> $id,



        ]);
    }
}
