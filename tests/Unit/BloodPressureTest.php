<?php

use App\Enums\BloodPressure;

it('can determine normal status', function () {
    expect(BloodPressure::status(119, 79))->toBe('normal');
});

it('can determine elevated status', function () {
    expect(BloodPressure::status(120, 79))->toBe('Elevated');
    expect(BloodPressure::status(129, 79))->toBe('Elevated');
});

it('can determine hypertension stage 1 status', function () {
    expect(BloodPressure::status(139, 79))->toBe('Hypertension Stage 1');
    expect(BloodPressure::status(120, 89))->toBe('Hypertension Stage 1');
});

it('can determine hypertension stage 2 status', function () {
    expect(BloodPressure::status(142, 78))->toBe('Hypertension Stage 2');
    expect(BloodPressure::status(120, 120))->toBe('Hypertension Stage 2');
});

it('can determine hypertensive crisis status', function () {
    expect(BloodPressure::status(181, 80))->toBe('Hypertensive Crisis');
    expect(BloodPressure::status(120, 121))->toBe('Hypertensive Crisis');
});

it('returns awaiting valid reading for invalid input', function () {
    expect(BloodPressure::status(0, 0))->toBe('Awaiting valid reading...');
});

it('returns normal for values below the threshold', function () {
    expect(BloodPressure::status(110, 70))->toBe('normal');
});

it('returns hypotension for values below the threshold', function () {
    expect(BloodPressure::status(80, 50))->toBe('Hypotension');
});

it('returns awaiting valid reading for negative values', function () {
    expect(BloodPressure::status(-1, -1))->toBe('Awaiting valid reading...');
});

it('returns a valid pulse pressure', function () {
    expect(BloodPressure::pulsePressure(120, 80))->toBe(40);
    expect(BloodPressure::pulsePressure(130, 70))->toBe(60);
    expect(BloodPressure::pulsePressure(140, 90))->toBe(50);
});
