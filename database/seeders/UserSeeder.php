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

            // user->status
            // status = 0 Admin
            // status = 1 citizen
            // status = 2 company
            // status = 3 moderator

            $users = [
                [
                    'id' => 1,
                    'name' => 'Admin',
                    'username' => 'admin',
                    'status' => 0,
                    'password' => bcrypt('muhammad01'),
                    'password_text' => 'muhammad01',
                    'email' => 'muhammad01@geo.uz',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'id' => 2,
                    'name' => 'Fuqaro',
                    'username' => 'citizen',
                    'status' => 1,
                    'password' => bcrypt('citizen01'),
                    'password_text' => 'citizen01',
                    'email' => 'citizen@geo.uz',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'id' => 3,
                    'name' => 'Company',
                    'username' => 'company',
                    'status' => 2,
                    'password' => bcrypt('company01'),
                    'password_text' => 'company01',
                    'email' => 'company@geo.uz',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'id' => 4,
                    'name' => 'Moderator',
                    'username' => 'moderator',
                    'status' => 3,
                    'password' => bcrypt('moderator01'),
                    'email' => 'moderator@geo.uz',
                    'password_text' => 'moderator01',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
            ];
            DB::table('users')->insert($users);
    }
}
