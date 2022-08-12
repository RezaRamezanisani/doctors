<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $faker = Factory::create();
       $limit = 5;
       for ($i=0;$i<$limit;$i++){
           DB::table('categories')->insert([
              'skill'=> $faker->name,
//               'email' => $faker->unique()->email,
//                  namecolumnstable=> $faker->دستورات خود faker
//               'phone'=>$faker->phoneNumber,
           ]);
       }
//        php artisan db:seed --class=CustomersTableSeeder
    }
}
