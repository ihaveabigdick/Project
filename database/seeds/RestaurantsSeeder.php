<?php

use App\model\Restaurant;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class RestaurantsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $restaurants = new Restaurant();

        $restaurants->insert([
           ['name'=>'pizza hut','owner'=>'拎北','address'=>'台中市霧峰區中正路879號','phone'=>'04-23331111','msg'=>'必勝客霧峰店','fileUploadId'=>'1','created_at'=>Carbon::now(),'updated_at'=>Carbon::now()]




        ]);

    }
}
