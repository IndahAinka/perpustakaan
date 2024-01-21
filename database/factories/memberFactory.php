<?php

namespace Database\Factories;

use App\Models\Member;
use Illuminate\Support\Facades\Hash;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Member>
 */
class memberFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = Member::class;

    public function definition(): array
    {
        return [
            'username' => $this->faker->userName,
            'password' => bcrypt($this->faker->password),
            'nama' => $this->faker->name,
            'alamat' => $this->faker->address,
            'hp' => $this->faker->phoneNumber,
            'email' => $this->faker->email,
            'status' => $this->faker->randomElement(['active', 'non-active']),
        ];
    }
}
