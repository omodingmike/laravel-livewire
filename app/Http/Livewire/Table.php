<?php

namespace App\Http\Livewire;

use App\Models\Patient;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Table extends Component
{
    public $patients, $name = '', $age = '', $location = '', $patient, $createPatient = false, $updatePatient = false, $showAll = true, $updateName, $updateAge, $updateLocation, $patientToUpdate;
    protected $rules = [
        'name'     => 'required|string',
        'location' => 'required|string',
        'age'      => 'required|numeric'

    ];
    protected $messages = [
        'name.required'     => 'Name is required',
        'location.required' => 'Location is required',
        'age.required'      => 'Age is required',
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

    public function mount($patients): void
    {
        $this->patients = $patients;
    }

    public function render()
    {
        return view('livewire.table');
    }

    public function deletePatient($id): void
    {
        $deleted = Patient::find($id)->delete();
        $this->patients = Patient::all();
    }

    public function store(): void
    {
        $validated = $this->validate();
        DB::table('patients')->insert($validated);
        $this->patients = $this->getPatients();
        $this->reset(['name', 'age', 'location']);
    }

    public function getPatients(): Collection
    {
        return Patient::all();
    }

    public function edit($id): void
    {
        $this->patientToUpdate = Patient::find($id);
        $this->updateName = $this->patientToUpdate->name;
        $this->updateAge = $this->patientToUpdate->age;
        $this->updateLocation = $this->patientToUpdate->location;
    }

    public function update(): void
    {
        $updated = $this->patientToUpdate->update([
            'name'     => $this->updateName,
            'age'      => $this->updateAge,
            'location' => $this->updateLocation,
        ]);
        $this->patients = Patient::all();
    }
}
