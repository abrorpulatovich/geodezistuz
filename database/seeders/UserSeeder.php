<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {            
            $users = [
                [
                    'id' => 1,
                    'name' => 'Admin',
                    'username' => 'admin',
                    'password' => bcrypt('muhammad01'),
                    'email' => 'muhammad01@geo.uz',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'id' => 2,
                    'name' => 'Fuqaro',
                    'username' => 'citizen',
                    'password' => bcrypt('citizen01'),
                    'email' => 'citizen@geo.uz',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'id' => 3,
                    'name' => 'Company',
                    'username' => 'company',
                    'password' => bcrypt('company01'),
                    'email' => 'company@geo.uz',
                    'created_at' => now(),
                    'updated_at' => now(),
                ]
            ];
            DB::table('users')->insert($users);
    }
}
