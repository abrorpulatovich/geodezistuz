<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $roles = [
                [
                    'id' => 1,
                    'name' => 'admin',
                    'guard_name' => 'web',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'id' => 2,
                    'name' => 'citizen',
                    'guard_name' => 'web',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'id' => 3,
                    'name' => 'Company',
                    'guard_name' => 'web',
                    'created_at' => now(),
                    'updated_at' => now(),
                ]
            ];
            DB::table('roles')->insert($roles);

        $tasks = [
                [
                    'role_id' => 1,
                    'model_type' => 'App\Model\User',
                    'model_id' => 1
                ],
                [
                    'role_id' => 2,
                    'model_type' => 'App\Model\User',
                    'model_id' => 2
                ],
                [
                    'role_id' => 3,
                    'model_type' => 'App\Model\User',
                    'model_id' => 3
                ]

            ];
            DB::table('model_has_roles')->insert($tasks);
    }
}
