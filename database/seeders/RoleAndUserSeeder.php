<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class RoleAndUserSeeder extends Seeder
{
    public function run(): void
    {
        $adminRole = Role::firstOrCreate(['name' => 'admin']);
        Role::firstOrCreate(['name' => 'user']);

        if (User::role('admin')->exists()) {
            $this->command->info('Admin user already exists — skipping seed.');
            return;
        }

        if (!function_exists('posix_isatty') || !posix_isatty(STDIN)) {
            $email = 'admin@example.com';
            $password = 'admin';
        } else {
            $email = $this->command->ask('Admin email', 'admin@example.com') ?: 'admin@example.com';
            $password = $this->command->secret('Admin password') ?: 'admin';
        }

        $admin = User::updateOrCreate(
            ['email' => $email],
            [
                'name' => 'Admin',
                'password' => Hash::make($password),
            ]
        );

        $admin->assignRole($adminRole);
    }
}
