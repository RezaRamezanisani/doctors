<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use phpDocumentor\Reflection\DocBlock\Tags\Uses;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // php artisan make:seeder UsersTableSeeder
        //php artisan tinker
        $faker  = Factory::create();
        $limit= 5;
        for ($i=0;$i<$limit;$i++){
           User::create([
               'name'=>$faker->name,
               'email_phone'=>$faker->unique()->email,
               'password'=> Hash::make('123456Re'),
               'img'=>$faker->image,
               'hours_of_work'=>$faker->time,
               'role_id'=>3,
               'category_id'=>3
           ]);
        }
    }
}
