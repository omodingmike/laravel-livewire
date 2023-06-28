<?php

namespace Tests\Unit;

use App\Http\Livewire\Table;
use App\Models\Patient;
use Livewire\Livewire;
use Tests\TestCase;

class PatientTest extends TestCase
{
    function can_create_patient(): void
    {
        $this->actingAs(Patient::factory()->create());
        Livewire::test(Table::class)
            ->set('name', 'John')
            ->set('age', 21)
            ->set('location', 'salama')
            ->call('store');
        $this->assertTrue(Patient::whereName('John')->exists());
    }

    public function fields_required(): void
    {
        $this->actingAs(Patient::factory()->create());
        Livewire::test(Table::class)
            ->set('name', '')
            ->set('age', null)
            ->set('location', '')
            ->call('store')
            ->assertHasErrors([
                'name'     => 'required|string',
                'location' => 'required|string',
                'age'      => 'required|numeric'
            ]);
    }

    public function the_component_can_render(): void
    {
        $component = Livewire::test(Table::class);
        $component->assertStatus(200);
    }

    function home_page_contains_livewire_component(): void
    {
        $this->get('/')->assertSeeLivewire('patients');
    }

}
