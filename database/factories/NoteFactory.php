<?php

namespace Database\Factories;

use App\Models\DoctorPatient;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Note>
 */
class NoteFactory extends Factory
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
            'note' => fake()->paragraph(4),
        ];
    }
}
