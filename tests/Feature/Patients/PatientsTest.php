<?php

namespace Tests\Feature\Patients;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PatientsTest extends TestCase
{
    use RefreshDatabase;
    /**
     * test_get_all_patients
     *
     * @return void
     */
    public function test_get_all_patients(): void
    {
        $id_medico = rand(1,50);
        $user = User::factory(1)->create();
        dd($user);
        $response = $this->get("/medicos/$id_medico/pacientes");

        $response->assertStatus(200);
    }
}
