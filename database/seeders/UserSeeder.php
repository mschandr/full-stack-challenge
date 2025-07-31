<?php

namespace Database\Seeders;

use App\Enums\{UserRole, UserStatus};
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{

    protected function createIfNotExists(array $attributes): void
    {
        if (!User::where('email', $attributes['email'])->exists()) {
            User::create(array_merge([
                'id'       => Str::uuid(),
                'password' => Hash::make($attributes['password'] ?? 'password'),
                'status'   => UserStatus::VERIFIED,
            ], $attributes));
        }
    }

    /**
     * Run the database seeds.
     */
    protected function runOnce(): void
    {
        $users = [
            [
                'name'     => 'Admin User',
                'email'    => config('admin.user_email', 'admin@example.com'),
                'password' => config('admin.user_password', 'secret'),
                'role'     => UserRole::ADMIN,
            ],
            [
                'name'     => 'Company HR',
                'email'    => 'hr@example.com',
                'password' => 'password',
                'role'     => UserRole::POSTER,
            ],
            [
                'name'     => 'Job Seeker',
                'email'    => 'seeker@example.com',
                'password' => 'password',
                'role'     => UserRole::SEEKER,
            ],
        ];
        foreach ($users as $user) {
            $this->createIfNotExists($user);
        }
    }

    public function run(): void
    {
        $this->runOnce();
        User::factory()->count(10)->poster()->create();
        User::factory()->count(80)->seeker()->verified()->create();
        User::factory()->count(20)->seeker()->unverified()->create();
    }
}
