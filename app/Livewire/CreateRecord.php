<?php

namespace App\Livewire;

use App\Models\Record;
use Livewire\Component;
use App\Livewire\Forms\RecordForm;
use Illuminate\Support\Facades\Auth;

class CreateRecord extends Component
{
    public RecordForm $form;

    public function mount()
    {
        $this->form->user_id = Auth::user()->id;
    }

    public function submit()
    {
        $this->form->validate();

        Record::create($this->form->all());

        session()->flash('message', 'New BP reading created successfully.');

        return redirect()->route('records.index');
    }

    public function render()
    {
        return view('livewire.create-record');
    }
}
