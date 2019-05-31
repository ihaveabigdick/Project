<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
         $this->call(fileUpload::class);
         $this->call(User::class);
         $this->call(SexTableSeeder::class);
         $this->call(RestaurantsSeeder::class);
         $this->call(MenuGroupSeeder::class);

    }
}
