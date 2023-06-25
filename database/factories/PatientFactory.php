<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Patient;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Patient>
 */
class PatientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $birth_date = fake()->dateTime();

        return [
            'user_id' => User::where('type', 'patient')->first()->id,
            'birth_date' => $birth_date,
            'address' => fake()->address(),
            'age' => now()->diffInYears($birth_date),
        ];
    }


}
