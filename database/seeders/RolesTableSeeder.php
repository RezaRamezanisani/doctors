<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        $faker  = Factory::create();
        $roles = ['admin','super admin','user'];
        $limit= 5;
        for ($i=0;$i<$limit;$i++){
             Role::create([
                 'role'=>$roles[array_rand($roles)]
             ]);
        }
    }
}
