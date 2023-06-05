<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'phone' => fake()->unique()->phoneNumber(),
            'type' => fake()->randomElement(['admin', 'doctor', 'patient']),
            'image' => 'default_image.png',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }

    public function configure()
    {
        global $nextUserType;

        if (!isset($nextUserType)) {
            $nextUserType = 0;
        }

        return $this->afterCreating(function (User $user) use (&$nextUserType) {
            $userTypes = ['admin', 'doctor', 'patient'];
            $user->update(['type' => $userTypes[$nextUserType]]);
            $nextUserType = ($nextUserType + 1) % count($userTypes);
        });
    }
}
