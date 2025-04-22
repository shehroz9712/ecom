<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\DB;

class RolePermissionSeeder extends Seeder
{
    public function run()
    {
        // Define permissions
        $permissions = ['create', 'edit', 'delete', 'view'];
        $models = [
            'users',
            'roles',
            'permissions',

            'media',
            'carts',
            'orders',

            'pages',
            'sliders',
            'blogs',
            'settings',

        ];

        // Fix existing role & permission guards
        DB::table('roles')->update(['guard_name' => 'api']);
        DB::table('permissions')->update(['guard_name' => 'api']);

        // Create roles if they don’t exist
        $superAdminRole = Role::firstOrCreate(['name' => 'Super Admin', 'guard_name' => 'api']);
        $adminRole = Role::firstOrCreate(['name' => 'Admin', 'guard_name' => 'api']);
        $userRole = Role::firstOrCreate(['name' => 'User', 'guard_name' => 'api']);
        $guestRole = Role::firstOrCreate(['name' => 'Guest', 'guard_name' => 'api']);

        // Create hierarchical permissions
        $parentPermissions = [];
        foreach ($models as $model) {
            $parentPermission = Permission::firstOrCreate([
                'name' => $model,
                'guard_name' => 'api',
                'parent_id' => null,
            ]);

            $parentPermissions[$model] = $parentPermission->id;

            foreach ($permissions as $action) {
                Permission::firstOrCreate([
                    'name' => "{$action}-{$model}",
                    'guard_name' => 'api',
                    'parent_id' => $parentPermission->id,
                ]);
            }
        }

        // Assign all permissions to Super Admin
        $superAdminRole->syncPermissions(Permission::all());

        // Assign specific permissions to Admin
        $adminPermissions = [
            'view-users',
            'create-users',
            'edit-users',
            'delete-users',
            'view-roles',

            'create-media',
            'view-media',
            'edit-media',
            'delete-media',

            'create-pages',
            'view-pages',
            'edit-pages',

            'create-settings',
            'view-settings',
            'edit-settings',
            'delete-settings',
            'delete-pages',
            'create-sliders',
            'view-sliders',
            'edit-sliders',
            'delete-sliders',

        ];
        $adminRole->syncPermissions($adminPermissions);

        // Assign specific permissions to User
        $userRole->syncPermissions([
            'view-users',
            'create-users',
            'edit-users',

            'create-media',
            'view-media',
            'edit-media',
            'delete-media',

            'create-orders',
            'view-orders',
            'edit-orders',
            'delete-orders',

            'create-carts',
            'view-carts',
            'edit-carts',
            'delete-carts',

            'view-pages',

            'view-blogs',

            'create-blogs',
            'view-blogs',
            'edit-blogs',
            'delete-blogs',

        ]);

        // Assign specific permissions to Guest User
        $guestRole->syncPermissions([
        ]);
    }
}
