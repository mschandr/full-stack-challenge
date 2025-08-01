<?php

namespace Database\Seeders;

use App\Models\Company;
use App\Models\RejectionReason;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class RejectionReasonSeeder extends Seeder
{
    protected array $reasons = [
        'lack_experience'    => 'Lack of required experience.',
        'missing_quals'      => 'Missing required qualifications.',
        'overqualified'      => 'You appear overqualified for this position.',
        'failed_assessment'  => 'You did not meet our assessment criteria.',
        'poor_fit'           => 'We did not feel the role was a good fit at this time.',
        'position_filled'    => 'This position has already been filled.',
        'incomplete_app'     => 'Your application was incomplete.',
    ];

    public function run(): void
    {
        $companies = Company::whereIn('slug', ['acme', 'globex', 'infinity', 'hooli', 'umbrella', 'cyberdyne',
                                               'wayne', 'stark', 'piedpiper'])->get();

        foreach ($companies as $company) {
            $first = true;
            foreach ($this->reasons as $code => $prompt) {
                RejectionReason::firstOrCreate(
                    [
                        'company_id' => $company->id,
                        'code'       => $code,
                    ],
                    [
                        'id'         => Str::uuid(),
                        'prompt'     => $prompt,
                        'default'    => $first ? 1 : 0,
                    ]
                );
                $first = false;
            }
        }
    }
}
