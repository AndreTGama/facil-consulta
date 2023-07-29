<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            CitiesSeeder::class
        ]);

        \App\Models\Doctors::factory(50)->create();
        \App\Models\Patients::factory(50)->create();
        \App\Models\DoctorsPatients::factory(50)->create();
        \App\Models\User::factory(2)->create();
    }
}
