<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create roles
        $adminRole = Role::create(['name' => 'admin']);
        $sellerRole = Role::create(['name' => 'seller']);

        // Define permissions
        $adminPermissions = [
            'manage users',
            'manage categories',
            'approve sellers',
        ];

        $sellerPermissions = [
            'manage books',
            'view orders',
            'update profile',
        ];

        // Create and assign permissions to roles
        foreach ($adminPermissions as $permission) {
            Permission::create(['name' => $permission]);
            $adminRole->givePermissionTo($permission);
        }

        foreach ($sellerPermissions as $permission) {
            Permission::create(['name' => $permission]);
            $sellerRole->givePermissionTo($permission);
        }

        // User::factory(10)->create();
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
    }
}
