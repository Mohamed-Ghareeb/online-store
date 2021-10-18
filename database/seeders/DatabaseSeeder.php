<?php
declare(strict_types=1);

namespace Database\Seeders;

use Database\Factories\LocationFactory;
use Domains\Catalog\Models\Category;
use Domains\Catalog\Models\Product;
use Domains\Catalog\Models\Range;
use Domains\Customer\Models\Address;
use Domains\Customer\Models\Location;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run(): void
    {
        Location::factory(50)->create();
        Address::factory()->create();
        Product::factory(50)->create();
    }
}
