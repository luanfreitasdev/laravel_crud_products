<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (DB::table('users')->count() == 0) {
            DB::table('users')->insert([
                'name' => 'Admin',
                'email' => 'admin@admin.com.br',
                'password' => bcrypt('12345678'),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
            DB::table('users')->insert([
                'name' => 'User',
                'email' => 'user@user.com.br',
                'password' => bcrypt('12345678'),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
