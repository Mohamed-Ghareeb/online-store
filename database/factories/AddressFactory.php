<?php
declare(strict_types=1);

namespace Database\Factories;

use Domains\Customer\Models\Address;
use Domains\Customer\Models\Location;
use Domains\Customer\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class AddressFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Address::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'label' => $this->faker->randomElement([
                'Home',
                'Office',
                'Head Office',
                'Mums House',
            ]),

            'billing' => $this->faker->boolean(),
            'user_id' => User::factory()->create()->id,
            'location_id' => Location::factory()->create()->id,
        ];
    }


    /**
     * Indicate that the address is billing.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function billing(): Factory
    {
        return $this->state(function (array $attributes) {
            return [
                'billing' => true
            ];
        });
    }

    /**
     * Indicate that the address is shipping.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function shipping(): Factory
    {
        return $this->state(function (array $attributes) {
            return [
                'billing' => false
            ];
        });
    }
}
