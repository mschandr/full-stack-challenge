<?php

namespace Database\Seeders;

use App\Models\Company;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CompanySeeder extends Seeder
{

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->runOnce();
        Company::factory()->count(8)->create();
    }

    protected function runOnce(): void
    {
        $companies = [
            ['name' => 'Acme Corp', 'description' => 'Innovation at scale.', 'slug' => 'acme', 'website' => 'https://acme.example'],
            ['name' => 'Globex', 'description' => 'Global excellence.', 'slug' => 'globex', 'website' => 'https://globex.example'],
            ['name' => 'Inifitech', 'description' => 'Infinite solutions.', 'slug' => 'infinity', 'website' => 'https://initech.example'],
            ['name' => 'Hooli', 'description' => 'Making the world a better place.', 'slug' => 'hooli', 'website' => 'https://hooli.example'],
            ['name' => 'Umbrella Corp', 'description' => 'Pharmaceuticals and more.', 'slug' => 'umbrella', 'website' => 'https://umbrella.example'],
            ['name' => 'Cyberdyne Systems', 'description' => 'AI and robotics.', 'slug' => 'cyberdyne', 'website' => 'https://cyberdyne.example'],
            ['name' => 'Wayne Enterprises', 'description' => 'Gotham-based innovations.', 'slug' => 'wayne', 'website' => 'https://wayne.example'],
            ['name' => 'Stark Industries', 'description' => 'Defense and technology.', 'slug' => 'stark', 'website' => 'https://stark.example'],
            ['name' => 'Pied Piper', 'description' => 'Revolutionizing compression.', 'slug' => 'piedpiper', 'website' => 'https://piedpiper.example'],
        ];

        foreach ($companies as $company) {
            $this->createIfNotExists($company);
        }
    }

    protected function createIfNotExists(array $attributes): void
    {
        if (!Company::where('name', $attributes['name'])->exists()) {
            Company::create(array_merge([
                'id' => Str::uuid(),
            ], $attributes));
        }
    }
}
