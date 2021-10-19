<?php
declare(strict_types=1);

namespace Database\Seeders;

use Domains\Catalog\Models\Cart;
use Domains\Catalog\Models\Variant;
use Domains\Customer\Models\Address;
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
        Address::factory()->create();
        Variant::factory(50)->create();
        Cart::factory(10)->create();
    }
}
