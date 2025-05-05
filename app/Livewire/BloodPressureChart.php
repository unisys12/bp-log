<?php

namespace App\Livewire;

use App\Models\Record;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

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
                ];
            });
    }

    public function render()
    {
        return view('livewire.blood-pressure-chart');
    }
}
