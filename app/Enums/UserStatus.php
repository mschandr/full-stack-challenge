<?php

namespace App\Enums;

enum UserStatus: int
{
    case UNVERIFIED = 0;
    case VERIFIED = 1;
    case SUSPENDED = 2;
    case DELETED = 3;

    public function label(): string
    {
        return match($this) {
            self::UNVERIFIED => 'Unverified',
            self::VERIFIED => 'Verified',
            self::SUSPENDED => 'Suspended',
            self::DELETED => 'Deleted',
        };
    }
}
