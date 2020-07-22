<?php

use Illuminate\Database\Seeder;

// Import DB and Faker services
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
       
        Eloquent::unguard();
        $this->call('UsersTableSeeder');

        $faker = Faker::create();

        // foreach (range(1,500) as $index) {
        //     DB::table('employee')->insert([
        //         'firstname' => $faker->firstname,
        //         'lastname' => $faker->lastname,
        //         'email' => $faker->email,
        //         'phone' => $faker->phone,
        //         'c_id' => $faker->c_id
        //     ]);
        // }
    }
}
