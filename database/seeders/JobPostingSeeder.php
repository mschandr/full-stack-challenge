<?php

namespace Database\Seeders;

use App\Enums\UserRole;
use App\Models\{Company, JobPosting, User};
use Illuminate\Database\Seeder;

class JobPostingSeeder extends Seeder
{
    const SLUGS = ['acme', 'globex', 'infinity', 'hooli', 'umbrella', 'cyberdyne', 'wayne', 'stark', 'piedpiper'];

    public function run(): void
    {
        $companies = Company::whereIn('slug', self::SLUGS)->get();

        foreach ($companies as $company) {
            $posters = User::where('company_id', $company->id)
                ->where('role', UserRole::POSTER)
                ->get();

            if ($posters->isEmpty()) {
                continue;
            }

            $count = rand(0, 10);

            JobPosting::factory()
                ->count($count)
                ->state(function () use ($company, $posters) {
                    $poster = $posters->random();
                    return [
                        'company_id' => $company->id,
                        'created_by' => $poster->id,
                        'updated_by' => $poster->id,
                    ];
                })
                ->create();
        }
    }
}
