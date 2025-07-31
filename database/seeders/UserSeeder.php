<?php

namespace Database\Seeders;

use App\Enums\{UserRole, UserStatus};
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function runOnce(): void
    {
        User::create([
            'id'       => Str::uuid(),
            'name'     => 'Admin User',
            'email'    => config('admin.user_email', 'admin@example.com'),
            'password' => Hash::make(config('admin.user_password', 'secret')),
            'role'     => UserRole::ADMIN,
            'status'   => UserStatus::VERIFIED,
        ]);

        User::create([
            'id'       => Str::uuid(),
            'name'     => 'Company HR',
            'email'    => 'hr@example.com',
            'password' => Hash::make('password'),
            'role'     => UserRole::POSTER,
            'status'   => UserStatus::VERIFIED,
        ]);

        User::create([
            'id'       => Str::uuid(),
            'name'     => 'Job Seeker',
            'email'    => 'seeker@example.com',
            'password' => Hash::make('password'),
            'role'     => UserRole::SEEKER,
            'status'   => UserStatus::VERIFIED,
        ]);
    }

    public function run(): void
    {
        $this->runOnce();
    }
}
