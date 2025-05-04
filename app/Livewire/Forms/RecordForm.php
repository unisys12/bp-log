<?php

namespace App\Livewire\Forms;

use Livewire\Form;
use Livewire\Attributes\Validate;

class RecordForm extends Form
{
    #[Validate('required|exists:users,id')]
    public int $user_id;

    #[Validate('required|numeric|min:0|max:300')]
    public int $weight;

    #[Validate('required|numeric|min:0|max:300')]
    public int $systolic;

    #[Validate('required|numeric|min:0|max:300')]
    public int $diastolic;

    #[Validate('required|numeric|min:0|max:300')]
    public int $pulse = 0;

    #[Validate('required|date')]
    public string $date;

    #[Validate('required|date_format:H:i')]
    public string $time;

    #[Validate('nullable|string|max:255')]
    public string $notes;
}
