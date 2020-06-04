<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ResourceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (DB::table('resources')->count() == 0) {
            DB::table('resources')->insert([
                'controller' => 'manage',
                'action' => 'users',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
            DB::table('resources')->insert([
                'controller' => 'manage',
                'action' => 'roles',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
            DB::table('resources')->insert([
                'controller' => 'user',
                'action' => 'edit',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
            DB::table('resources')->insert([
                'controller' => 'user',
                'action' => 'delete',
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            DB::table('resource_role')->insert([
                'role_id' => 1,
                'resource_id' => 1,
            ]);
            DB::table('resource_role')->insert([
                'role_id' => 1,
                'resource_id' => 2,
            ]);
            DB::table('resource_role')->insert([
                'role_id' => 1,
                'resource_id' => 3,
            ]);
            DB::table('resource_role')->insert([
                'role_id' => 1,
                'resource_id' => 4,
            ]);
        }
    }
}
