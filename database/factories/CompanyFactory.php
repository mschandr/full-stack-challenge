<?php

namespace Database\Factories;

use App\Models\Company;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class CompanyFactory extends Factory
{
    protected $model = Company::class;

    public function definition(): array
    {
        return [
            'id'          => Str::uuid(),
            'name'        => $this->faker->company,
            'slug'        => $this->faker->slug,
            'description' => $this->faker->paragraph,
            'website'     => $this->faker->url,
            'created_by'  => null, // Can be updated later if needed
            'updated_by'  => null,
        ];
    }
}