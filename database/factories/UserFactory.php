<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends Factory<User>
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
            'name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => $this->faker->password(),
            'remember_token' => Str::random(10),
            'avatar_url' => $this->faker->image()
        ];
    }

    /**
     * Установка роли модератор пользователю.
     *
     * @return UserFactory
     */
    public function moderator(): UserFactory
    {
        return $this->state(function (array $attributes) {
            return [
                'is_moderator' => true
            ];
        });
    }
}
