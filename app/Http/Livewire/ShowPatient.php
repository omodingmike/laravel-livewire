<?php

namespace App\Http\Livewire;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class ShowPatient extends Component
{
    public $patientID;

    public function render(): View|\Illuminate\Foundation\Application|Factory|Application
    {
        return view('livewire.show-patient');
    }

    public function mount($patientID): void
    {
        $this->patientID = $patientID;
    }
}
