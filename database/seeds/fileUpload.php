<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class fileUpload extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $fileUpload = new \App\model\FileUpload();

        $fileUpload->insert(
          ['realName'=>'asda','path'=>'C:\xampp\htdocs\project\public\img\asda.jpg','uploadName'=>'柯文哲.jpg','uploadType'=>'jpg','created_at'=>Carbon::now(),'updated_at'=>Carbon::now()]




        );

    }


}
