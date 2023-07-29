<?php

namespace Tests\Feature\Cidades;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CidadesTest extends TestCase
{
    public function test_para_pegar_cidades(): void
    {
        $response = $this->get('/api/cidades');

        $response->assertStatus(200);
    }
}
