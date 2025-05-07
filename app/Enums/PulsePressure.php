<?php

declare(strict_types=1);

namespace App\Enums;

enum PulsePressure: string
{
    case Low = 'Low';
    case Normal = 'Normal';
    case High = 'High';

    public static function status(int $pulsePressure): string
    {
        return match (true) {
            $pulsePressure < 40 => self::Low->value,
            $pulsePressure >= 40 && $pulsePressure <= 60 => self::Normal->value,
            default => self::High->value,
        };
    }
}
