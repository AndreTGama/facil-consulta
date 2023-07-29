<?php

namespace Tests\Feature\Medicos;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class MedicosTest extends TestCase
{
    public function test_pegar_todos_medicos(): void
    {
        $response = $this->get('/api/medicos');

        $response->assertStatus(200);
    }
}
