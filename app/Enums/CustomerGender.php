<?php

namespace App\Enums;

enum CustomerGender: string
{
    case MALE = 'male';
    case FEMALE = 'female';
    case OTHER = 'other';

    public function label(): string
    {
        return match($this) {
            self::MALE => 'Homme',
            self::FEMALE => 'Femme',
            self::OTHER => 'Autre',
        };
    }
}
