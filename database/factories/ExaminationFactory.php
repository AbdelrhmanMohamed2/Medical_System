<?php

namespace Database\Factories;

use App\Models\DoctorPatient;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Examination>
 */
class ExaminationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'doctor_patient_id' => DoctorPatient::first()->id,
            'price' => fake()->numberBetween(10, 1000),
            'status' => fake()->randomElement([
                'pending', 'cancelled', 'success'
            ]),
            'time' => now(),
            'title' => fake()->paragraph(1),
            'description' => fake()->paragraph(4),
            'offer' => fake()->numberBetween(10, 50),
        ];
    }
}
