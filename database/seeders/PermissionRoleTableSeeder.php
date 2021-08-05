<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionRoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = Permission::all();
        foreach($permissions as $permission) {
            DB::table('permission_role')->insert([
                'role_id' => 1,
                'permission_id' => $permission->id
            ]);
        }

        DB::table('permission_role')->insert([
            'role_id' => 2,
            'permission_id' => 1
        ]);

        DB::table('permission_role')->insert([
            'role_id' => 2,
            'permission_id' => 2
        ]);

        DB::table('permission_role')->insert([
            'role_id' => 2,
            'permission_id' => 3
        ]);
    }
}
