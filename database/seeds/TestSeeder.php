<?php

use Illuminate\Database\Seeder;

class TestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //


        foreach (range(1,50)as $id)


            \App\model\test::create([
                'age' => random_int(15,80),
                'price'=> random_int(80,1888),




            ]);
    }
}
