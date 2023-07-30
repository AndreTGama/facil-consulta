<?php

namespace Tests\Feature\Medicos;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class MedicosTest extends TestCase
{
    /**
     * test_get_all_doctors
     *
     * @return void
     */
    public function test_get_all_doctors(): void
    {
        $response = $this->get('/api/medicos');

        $response->assertStatus(200);
    }
}
