<?php

declare(strict_types=1);

namespace App\Enums;

enum BloodPressure: string
{
    case Hypotension = 'Hypotension';
    case Normal = 'normal';
    case Elevated = 'Elevated';
    case HypertensionStage1 = 'Hypertension Stage 1';
    case HypertensionStage2 = 'Hypertension Stage 2';
    case HypertensiveCrisis = 'Hypertensive Crisis';

    public static function status($systolic, $diastolic): string
    {
        return match (true) {

            $systolic < 90 &&
                $systolic > 0 &&
                $diastolic < 60 &&
                $diastolic > 0
            => self::Hypotension->value,

            $systolic < 120 &&
                $systolic > 90 &&
                $diastolic < 80 &&
                $diastolic > 60
            => self::Normal->value,

            $systolic >= 120 &&
                $systolic <= 129 &&
                $diastolic < 80
            => self::Elevated->value,

            /**
             * Had to move this condition here because it was
             * conflicting with the Hypertension Stage 1 condition.
             */
            $systolic > 180 ||
                $diastolic > 120
            => self::HypertensiveCrisis->value,

            $systolic >= 130 &&
                $systolic <= 139 ||
                $diastolic >= 80 &&
                $diastolic <= 89
            => self::HypertensionStage1->value,

            $systolic >= 140 ||
                $diastolic >= 90
            => self::HypertensionStage2->value,

            default => 'Awaiting valid reading...',
        };
    }

    /**
     * Calculate the pulse pressure based on systolic and diastolic values.
     *
     * - A normal pulse pressure is typically around 40 mmHg.
     * - A pulse pressure of less than 40 mmHg may indicate aortic stenosis or other heart conditions.
     * - A pulse pressure of 60 mmHg or more is considered high and may indicate an increased risk of cardiovascular disease.
     *
     * @param int $systolic Systolic blood pressure value.
     * @param int $diastolic Diastolic blood pressure value.
     * @return int Pulse pressure value.
     */
    public static function pulsePressure($systolic, $diastolic): int
    {
        return $systolic - $diastolic;
    }
}
