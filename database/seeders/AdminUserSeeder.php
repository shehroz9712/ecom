<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $adminRole = Role::firstOrCreate(['name' => 'Admin', 'guard_name' => 'api']);

        // Create or find an admin user
        $admin = User::firstOrCreate(
            ['email' => 'admin@admin.com'],
            [
                'name' => 'Admin',
                'password' => bcrypt('12345678'),
            ]
        );

        // Assign the Admin role to the user
        if (!$admin->hasRole('Admin')) {
            $admin->assignRole($adminRole);
        }

        $this->command->info('Admin user created successfully!');
    }
}
