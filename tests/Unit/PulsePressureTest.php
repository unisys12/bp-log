<?php

declare(strict_types=1);

use App\Enums\PulsePressure;

it('returns a valid pulse pressure status', function () {
    expect(PulsePressure::status(30))->toBe('Low');
    expect(PulsePressure::status(50))->toBe('Normal');
    expect(PulsePressure::status(70))->toBe('High');
});
