<?php

namespace Database\Factories;

use App\Enums\UserRole;
use App\Enums\UserStatus;
use App\Models\Company;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends Factory<User>
 */
class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name'           => fake()->name(),
            'email'          => fake()->unique()->safeEmail(),
            'password'       => static::$password ??= Hash::make('password'),
            'remember_token' => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn(array $attributes) => [
            'status'            => UserStatus::UNVERIFIED,
            'email_verified_at' => null,
        ]);
    }

    /**
     *  For Posters they need a special role and have to be verified to move on.
     *
     * @return static
     */
    public function poster(): static
    {
        return $this->state(fn(array $attributes) => [
            'role'              => UserRole::POSTER,
            'status'            => UserStatus::VERIFIED,
            'email_verified_at' => now(),
            'company_id'        => Company::inRandomOrder()->first()->id,
        ]);
    }

    public function seeker(): static
    {
        return $this->state(fn() => [
            'role'       => UserRole::SEEKER,
            'status'     => UserStatus::VERIFIED,
            'company_id' => null,
        ]);
    }

    public function verified(): static
    {
        return $this->state(fn(array $attributes) => [
            'status'            => UserStatus::VERIFIED,
            'email_verified_at' => now(),
        ]);
    }

}
