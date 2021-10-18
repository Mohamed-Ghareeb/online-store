<?php
declare(strict_types=1);

namespace Database\Factories;

use Domains\Catalog\Models\Category;
use Domains\Catalog\Models\Product;
use Domains\Catalog\Models\Range;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        $cost = $this->faker->numberBetween(100, 10000);

        return [
            'name'        => $this->faker->words(4, true),
            'description' => $this->faker->paragraphs(2, true),
            'cost'        => $cost,
            'retail'      => ($cost / config('shop.profit_margin')),
            'active'      => $this->faker->boolean,
            'vat'         => config('shop.vat'),
            'category_id' => Category::factory()->create()->id,
            'range_id'    => $this->faker->boolean ? Range::factory()->create()->id : null,
        ];
    }
}
