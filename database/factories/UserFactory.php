<?php
declare(strict_types=1);

namespace Database\Factories;

use Domains\Customer\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'first_name'     => $this->faker->firstName,
            'last_name'      => $this->faker->lastName,
            'email'          => $this->faker->unique()->safeEmail(),
            'password'       => Hash::make('password'), // password
            'remember_token' => Str::random(10),
        ];
    }
}
