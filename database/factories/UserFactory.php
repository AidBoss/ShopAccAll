<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

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
            'username' => $this->faker->userName,
            'account_name' => $this->faker->unique()->userName,
            'password' => Hash::make('password'), // Bạn có thể thay đổi mật khẩu mặc định
            'email' => $this->faker->unique()->safeEmail,
            'phone' => $this->faker->unique()->numerify('##########'),
            'avatar' => $this->faker->imageUrl(640, 480, 'people', true, 'Faker'),
            'role' => '1',
            'balance' => $this->faker->randomFloat(2, 0, 1000000),
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
}