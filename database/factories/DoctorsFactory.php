<?php

namespace Database\Factories;

use App\Models\Doctors;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Doctors>
 */
class DoctorsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var class-string<\Illuminate\Database\Eloquent\Model>
     */
    protected $model = Doctors::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $specialty = ['Acupuntura', 'Cardiologia', 'Coloproctologia', 'Infectologia', 'Neurologia', 'Urologia'];

        return [
            'nome' => fake()->name(),
            'especialidade' => $specialty[rand(0, 5)],
            'cidade_id' => rand(1, 50),
        ];
    }
}
