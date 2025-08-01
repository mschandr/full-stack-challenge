<?php

namespace Database\Factories;

use App\Models\JobPosting;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Carbon\Carbon;

class JobPostingFactory extends Factory
{
    protected static array $TITLES = [
        'Software Engineer', 'Backend Developer', 'Frontend Developer',  'DevOps Engineer', 'QA Analyst', 'Product Manager',
        'UX Designer', 'Mobile Developer', 'Cloud Architect', 'Security Analyst', 'Data Engineer'
    ];

    public function definition(): array
    {
        $title           = fake()->randomElement(self::$TITLES);
        $workTypeOptions = [1, 2, 3]; // e.g., 1 = Onsite, 2 = Remote, 3 = Hybrid

        return [
            'id'          => Str::uuid(),
            'title'       => $title,
            'description' => fake()->paragraphs(3, true),
            'location'    => fake()->city . ', ' . fake()->stateAbbr,
            'work_type'   => fake()->randomElement($workTypeOptions),
            'salary'      => fake()->optional(0.7)->numberBetween(50, 180) * 1000,
            'expires_at'  => fake()->optional(0.5)->dateTimeBetween('now', '+90 days'),
            'visible'     => true,
            // `company_id`, `created_by`, and `updated_by` will be injected externally (in seeder)
        ];
    }
}
