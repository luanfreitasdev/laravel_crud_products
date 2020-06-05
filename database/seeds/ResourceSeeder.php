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
            $manageUsers = DB::table('resources')->insertGetId([
                'controller' => 'manage',
                'action' => 'users',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
            $manageRoles = DB::table('resources')->insertGetId([
                'controller' => 'manage',
                'action' => 'roles',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
            $manageProducts = DB::table('resources')->insertGetId([
                'controller' => 'manage',
                'action' => 'products',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
            $userEdit = DB::table('resources')->insertGetId([
                'controller' => 'user',
                'action' => 'edit',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
            $userDelete = DB::table('resources')->insertGetId([
                'controller' => 'user',
                'action' => 'delete',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
            $productCreate = DB::table('resources')->insertGetId([
                'controller' => 'product',
                'action' => 'create',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
            $productEdit = DB::table('resources')->insertGetId([
                'controller' => 'product',
                'action' => 'edit',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
            $productDelete = DB::table('resources')->insertGetId([
                'controller' => 'product',
                'action' => 'delete',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
            $pStatusPending = DB::table('resources')->insertGetId([
                'controller' => 'product',
                'action' => 'status_pending',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
            $pStatusUnderAnalysis = DB::table('resources')->insertGetId([
                'controller' => 'product',
                'action' => 'status_under_analysis',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
            $pStatusDisapproved = DB::table('resources')->insertGetId([
                'controller' => 'product',
                'action' => 'status_disapproved',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
            $pStatusOkay = DB::table('resources')->insertGetId([
                'controller' => 'product',
                'action' => 'status_okay',
                'created_at' => now(),
                'updated_at' => now(),
            ]);


            DB::table('resource_role')->insert([
                'role_id' => 1,
                'resource_id' => $manageUsers,
            ]);
            DB::table('resource_role')->insert([
                'role_id' => 1,
                'resource_id' => $manageRoles,
            ]);
            DB::table('resource_role')->insert([
                'role_id' => 1,
                'resource_id' => $manageProducts,
            ]);
            DB::table('resource_role')->insert([
                'role_id' => 1,
                'resource_id' => $userEdit,
            ]);
            DB::table('resource_role')->insert([
                'role_id' => 1,
                'resource_id' => $userDelete,
            ]);
            DB::table('resource_role')->insert([
                'role_id' => 1,
                'resource_id' => $productCreate,
            ]);
            DB::table('resource_role')->insert([
                'role_id' => 1,
                'resource_id' => $productEdit,
            ]);
            DB::table('resource_role')->insert([
                'role_id' => 1,
                'resource_id' => $productDelete,
            ]);
            DB::table('resource_role')->insert([
                'role_id' => 1,
                'resource_id' => $pStatusPending,
            ]);
            DB::table('resource_role')->insert([
                'role_id' => 1,
                'resource_id' => $pStatusDisapproved,
            ]);
            DB::table('resource_role')->insert([
                'role_id' => 1,
                'resource_id' => $pStatusUnderAnalysis,
            ]);
            DB::table('resource_role')->insert([
                'role_id' => 1,
                'resource_id' => $pStatusOkay,
            ]);

            DB::table('resource_role')->insert([
                'role_id' => 2,
                'resource_id' => $manageProducts,
            ]);
            DB::table('resource_role')->insert([
                'role_id' => 2,
                'resource_id' => $productEdit,
            ]);
            DB::table('resource_role')->insert([
                'role_id' => 2,
                'resource_id' => $pStatusPending,
            ]);
            DB::table('resource_role')->insert([
                'role_id' => 2,
                'resource_id' => $pStatusUnderAnalysis,
            ]);
        }
    }
}
