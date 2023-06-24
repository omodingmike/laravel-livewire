<?php

namespace App\Http\Livewire;

use App\Models\Patient;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Patients extends Component
{
    public $patients, $name = 'name', $age = '23', $location = 'location', $patient, $createPatient = false, $updatePatient = false, $showAll = true;
    protected $rules = [
        'name'     => 'required|string',
        'location' => 'required|string',
        'age'      => 'required|numeric'

    ];
    protected $listeners = [
        'deletePatientListener' => 'delete',
        'patientsChanged'       => '$refresh'
    ];

    public function create(): void
    {
        $this->showAll = false;
        $this->createPatient = true;
    }

    public function handleChange(): void
    {
        $this->patients = Patient::all();
    }


    public function mount(): void
    {
        $this->patients = $this->getPatients();
    }

    public function getPatients(): Collection
    {
        return Patient::all();
    }

    public function store()
    {
        $validated = $this->validate();
        DB::table('patients')->insert($validated);
        $this->patients = $this->getPatients();
        $this->reset(['name', 'age', 'location']);
        $this->createPatient = false;
        $this->showAll = true;
        $this->emit('patientsChanged');
        session()->flush('success', 'Patient created successfully');
    }

    public function edit($id): void
    {
        $this->showAll = false;
        $this->patient = Patient::find($id);
        $this->name = $this->patient->name;
        $this->age = $this->patient->age;
        $this->location = $this->patient->location;
        $this->updatePatient = true;
//        $this->emit('patientsChanged');
    }

    public function update(): void
    {
        $updated = $this->patient->update([
            'name'     => $this->name,
            'age'      => $this->age,
            'location' => $this->location,
        ]);
        if ($updated) {
            session()->flush('success', 'Patient Updated successfully');
        } else {
            session()->flush('error', 'Patient update failed');
        }
    }

    public function cancel(): void
    {
        $this->showAll = true;
        $this->createPatient = false;
        $this->updatePatient = false;
    }

    public function deletePatient($id)
    {
        $deleted = Patient::find($id)->delete();
//        $this->emit('patientsChanged');
//        if ($deleted) {
//            $this->emit('modelCreated');
//            session()->flush('success', 'Patient deleted successfully');
//        } else {
//
//            session()->flush('success', 'Patient could not be deleted');
//        }
    }

    public function render(): View|\Illuminate\Foundation\Application|Factory|Application
    {
//        $this->listen('modelCreated', 'refreshComponent');
        return view('livewire.patients');
    }

    public function refreshComponent()
    {
        $this->patients = Patient::all();
    }
}
