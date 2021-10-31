<?php
declare(strict_types=1);

namespace Database\Factories;

use Domains\Customer\Models\Location;
use Domains\Customer\Models\Order;
use Domains\Customer\Models\User;
use Domains\Customer\States\Statuses\OrderStatus;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

class OrderFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Order::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        $useCoupon   = $this->faker->boolean();
        $orderstatus = Arr::random(OrderStatus::toLabels());

        return [
            'number'        => $this->faker->bothify('ORD-####-####-####'),
            'state'         => $orderstatus,
            'coupon'        => $useCoupon ? $this->faker->imei() : null,
            'total'         => $this->faker->numberBetween(10000, 100000),
            'reduction'     => $useCoupon ? $this->faker->numberBetween(250, 2500) : 0,
            'shipping_id'   => Location::factory()->create(),
            'billing_id'    => Location::factory()->create(),
            'user_id'       => User::factory()->create(),
            'completed_at'  => ($orderstatus === 'completed') ? now() : null,
            'cancelled_at'  => ($orderstatus === 'cancelled') ? now() : null,
        ];
    }
}
