<?php
declare(strict_types=1);

namespace Database\Factories;

use Domains\Catalog\Models\Product;
use Domains\Catalog\Models\Variant;
use Domains\Customer\Models\Order;
use Domains\Customer\Models\OrderLine;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderLineFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = OrderLine::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        $variant = Variant::query()->inRandomOrder()->first();


        return [
            'name'              => $variant->name,
            'description'       => $variant->product->description,
            'retail'            => $variant->retail,
            'cost'              => $variant->cost,
            'quantity'          => $this->faker->numberBetween('1'. '10'),
            'purchasable_id'    => $variant->id,
            'purchasable_type'  => Variant::class,
            'order_id'          => Order::factory()->create()->id
        ];
    }
}
