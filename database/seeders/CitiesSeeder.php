<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CitiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'nome' => 'Adamantina',
                'estado' => 'São Paulo',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'nome' => 'Adolfo',
                'estado' => 'São Paulo',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'nome' => 'Aguaí',
                'estado' => 'São Paulo',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'nome' => 'Águas da Prata',
                'estado' => 'São Paulo',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'nome' => 'Águas de Lindóia',
                'estado' => 'São Paulo',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'nome' => 'Águas de Santa Bárbara',
                'estado' => 'São Paulo',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'nome' => 'Águas de São Pedro',
                'estado' => 'São Paulo',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'nome' => 'Agudos',
                'estado' => 'São Paulo',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'nome' => 'Alambari',
                'estado' => 'São Paulo',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'nome' => 'Alfredo Marcondes',
                'estado' => 'São Paulo',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'nome' => 'Altair',
                'estado' => 'São Paulo',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'nome' => 'Altinópolis',
                'estado' => 'São Paulo',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'nome' => 'Alto Alegre',
                'estado' => 'São Paulo',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'nome' => 'Alumínio',
                'estado' => 'São Paulo',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'nome' => 'Álvares Florence',
                'estado' => 'São Paulo',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'nome' => 'Álvares Machado',
                'estado' => 'São Paulo',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'nome' => 'Álvaro de Carvalho',
                'estado' => 'São Paulo',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'nome' => 'Alvinlândia',
                'estado' => 'São Paulo',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'nome' => 'Americana',
                'estado' => 'São Paulo',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'nome' => 'Américo Brasiliense',
                'estado' => 'São Paulo',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'nome' => 'Américo de Campos',
                'estado' => 'São Paulo',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'nome' => 'Amparo',
                'estado' => 'São Paulo',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'nome' => 'Analândia',
                'estado' => 'São Paulo',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'nome' => 'Andradina',
                'estado' => 'São Paulo',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'nome' => 'Angatuba',
                'estado' => 'São Paulo',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'nome' => 'Anhembi',
                'estado' => 'São Paulo',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'nome' => 'Anhumas',
                'estado' => 'São Paulo',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'nome' => 'Aparecida',
                'estado' => 'São Paulo',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'nome' => "Aparecida D'oeste",
                'estado' => 'São Paulo',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'nome' => 'Apiaí',
                'estado' => 'São Paulo',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'nome' => 'Araçariguama',
                'estado' => 'São Paulo',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'nome' => 'Araçatuba',
                'estado' => 'São Paulo',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'nome' => 'Araçoiaba da Serra',
                'estado' => 'São Paulo',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'nome' => 'Aramina',
                'estado' => 'São Paulo',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'nome' => 'Arandu',
                'estado' => 'São Paulo',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'nome' => 'Arapeí',
                'estado' => 'São Paulo',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'nome' => 'Araraquara',
                'estado' => 'São Paulo',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'nome' => 'Araras',
                'estado' => 'São Paulo',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'nome' => 'Arco-Íris',
                'estado' => 'São Paulo',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'nome' => 'Arealva',
                'estado' => 'São Paulo',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'nome' => 'Areias',
                'estado' => 'São Paulo',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'nome' => 'Areiópolis',
                'estado' => 'São Paulo',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'nome' => 'Ariranha',
                'estado' => 'São Paulo',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'nome' => 'Artur Nogueira',
                'estado' => 'São Paulo',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'nome' => 'Arujá',
                'estado' => 'São Paulo',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'nome' => 'Aspásia',
                'estado' => 'São Paulo',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'nome' => 'Assis',
                'estado' => 'São Paulo',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'nome' => 'Atibaia',
                'estado' => 'São Paulo',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'nome' => 'Auriflama',
                'estado' => 'São Paulo',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'nome' => 'Avaí',
                'estado' => 'São Paulo',
                'created_at' => now(),
                'updated_at' => now()
            ],
        ];

        DB::table('cidades')->insert($data);
    }
}
