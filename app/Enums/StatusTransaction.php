<?php

namespace App\Enums;

enum StatusTransaction: string
{
    case SUCCESS = 'success';
    case FAILED = 'failed';

    public function alias(): string
    {
        return match ($this) {
            self::SUCCESS => 'Success',
            self::FAILED => 'Failed',
        };
    }
}
