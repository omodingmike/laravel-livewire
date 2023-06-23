<?php

namespace App\Http\Livewire;

use App\Models\Patient;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class AllPatients extends Component
{
//    public $patients;

    public function render(): View|\Illuminate\Foundation\Application|Factory|Application
    {
        $patients = Patient::all();
        return view('livewire.all-patients', ['patients' => $patients]);
    }
}
