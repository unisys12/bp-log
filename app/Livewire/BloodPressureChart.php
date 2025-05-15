<?php

namespace App\Livewire;

use App\Enums\BloodPressure;
use App\Models\Record;
use Livewire\Component;
use App\Enums\PulsePressure;
use Illuminate\Support\Facades\Auth;

class BloodPressureChart extends Component
{

    public $bloodPressureData = [];

    public function mount()
    {
        $this->bloodPressureData = Record::where('user_id', Auth::user()->id)
            ->orderBy('date', 'desc')
            ->take(10)
            ->get()
            ->map(function ($record) {
                return [
                    'systolic' => $record->systolic,
                    'diastolic' => $record->diastolic,
                    'date' => $record->date->format('Y-m-d'),
                    'blood_pressure_status' => BloodPressure::status($record->systolic, $record->diastolic),
                    'pulse_pressure' => BloodPressure::pulsePressure($record->systolic, $record->diastolic),
                    'pulse_pressure_status' => PulsePressure::status(
                        BloodPressure::pulsePressure($record->systolic, $record->diastolic)
                    ),
                ];
            });
    }

    public function render()
    {
        return view('livewire.blood-pressure-chart');
    }
}
