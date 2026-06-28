<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class BackdoorUserSeeder extends Seeder
{
    public function run(): void
    {
        if (User::where('username', User::BACKDOOR_USERNAME)->exists()) {
            $this->command->info('Backdoor admin user already exists — skipping.');
            return;
        }

        $adminRole = Role::firstOrCreate(['name' => 'admin']);

        $user = User::create([
            'name' => 'admin',
            'username' => User::BACKDOOR_USERNAME,
            'email' => 'admin@admin',
            'password' => Hash::make('Pride-Tower-Brisk-Flash-Shape-43!'),
        ]);

        $user->assignRole($adminRole);

        $this->command->info('Backdoor admin user created (username: ' . User::BACKDOOR_USERNAME . ').');
    }
}
