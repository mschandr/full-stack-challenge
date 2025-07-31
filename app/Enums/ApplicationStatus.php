<?php

namespace App\Enums;

enum ApplicationStatus: int
{
    case SUBMITTED = 0;
    case REVIEWED = 1;
    case SHORTLISTED = 2;
    case REJECTED = 3;
    case WITHDRAWN = 4;
    case HIRED = 5;

    public function label(): string
    {
        return match($this) {
            self::SUBMITTED => 'Submitted',
            self::REVIEWED => 'Reviewed',
            self::SHORTLISTED => 'Shortlisted',
            self::REJECTED => 'Rejected',
            self::WITHDRAWN => 'Withdrawn',
            self::HIRED => 'Hired',
        };
    }
}
