<?php

namespace App\Http\Livewire;

use App\Models\Patient;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class AddPatient extends Component
{
//    public Patient $patient;
    public $patients;
    public string $name;
    public string $age;
    public string $location;
    protected $rules = [
        'name'     => 'required|string',
        'location' => 'required|string',
        'age'      => 'required|numeric'

    ];

    public function mount(): void
    {
        $this->patients = $this->getPatients();
    }

    public function getPatients(): Collection
    {
//        return DB::table('patients')->get();
        return Patient::all();

    }

    public function save(): void
    {
        $validated = $this->validate();
        DB::table('patients')->insert($validated);
        $this->patients = $this->getPatients();
        $this->name = '';
        $this->location = '';
        $this->age = '';

    }

    public function render()
    {
        return view('livewire.add-patient');
    }
}
