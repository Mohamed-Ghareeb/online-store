<?php
declare(strict_types=1);

namespace Database\Factories;

use Domains\Customer\Models\Coupon;
use Illuminate\Database\Eloquent\Factories\Factory;

class CouponFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Coupon::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        $max = $this->faker->numberBetween(10, 1000);

        return [
            'code'      => $this->faker->bothify('COUP-????-????'),
            'reduction' => $this->faker->numberBetween(100, 5000),
            'uses'      => $this->faker->numberBetween(1, $max),
            'max_uses'  => $this->faker->boolean() ? $max : null,
            'active'    => $this->faker->boolean(),
        ];
    }
}
