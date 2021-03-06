<?php
declare(strict_types=1);

namespace Database\Factories;

use Domains\Customer\Models\Cart;
use Domains\Customer\Models\User;
use Domains\Customer\States\Statuses\CartStatus;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

class CartFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Cart::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        $useCoupon = $this->faker->boolean();

        return [
            'status'    => Arr::random(CartStatus::toLabels()),
            'coupon'    => $useCoupon ? $this->faker->imei() : null,
            'total'     => $this->faker->numberBetween(10000, 100000),
            'reduction' => $useCoupon ? $this->faker->numberBetween(250, 2500) : 0,
            'user_id'   => User::factory()->create(),
        ];
    }
}
