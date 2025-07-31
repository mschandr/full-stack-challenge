<?php

namespace App\Enums;

enum UserRole: int
{
    case ADMIN = 1;
    case POSTER = 2;
    case SEEKER = 3;

    public function label(): string
    {
        return match($this) {
            self::ADMIN => 'Administrator',
            self::POSTER => 'Job Poster',
            self::SEEKER => 'Job Seeker',
        };
    }
}
