<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (DB::table('roles')->count() == 0) {
            DB::table('roles')->insert([
                'name' => 'admin',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
            DB::table('roles')->insert([
                'name' => 'user',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
            DB::table('role_user')->insert([
                'role_id' => 1, // admin
                'user_id' => 1, // admin
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            DB::table('role_user')->insert([
                'role_id' => 2, // usuario
                'user_id' => 2, // usuario
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
