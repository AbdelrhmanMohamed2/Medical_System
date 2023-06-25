<?php

namespace Database\Factories;

use App\Models\Specialty;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Doctor>
 */
class DoctorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        return [
            'user_id' =>  User::where('type', 'doctor')->first()->id,
            'description' => fake()->paragraph(4),
            'specialty_id' => Specialty::inRandomOrder()->first()->id,
        ];
    }


}
