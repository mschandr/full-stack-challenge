<?php

namespace App\Enums;

enum WorkType: int
{
    case REMOTE = 1;
    case HYBRID = 2;
    case ON_SITE = 3;

    public function label(): string
    {
        return match($this) {
            self::REMOTE => 'Remote',
            self::HYBRID => 'Hybrid',
            self::ON_SITE => 'On-Site',
        };
    }
}
