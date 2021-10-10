<?php
declare(strict_types=1);

namespace Database\Factories;

use Domains\Customer\Models\Location;
use Illuminate\Database\Eloquent\Factories\Factory;
use JustSteveKing\LaravelPostcodes\Service\PostcodeService;
use Illuminate\Support\Str;

class LocationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Location::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        $location       = app(PostcodeService::class)->getRandomPostcode();
        $streetAddress  = $this->faker->streetAddress;

        return [
            'house'     => Str::of($streetAddress)->before(' '),
            'street'    => Str::of($streetAddress)->after(' '),
            'parish'    => data_get($location, 'parish'),
            'ward'      => data_get($location, 'admin_ward'),
            'district'  => data_get($location, 'admin_district'),
            'country'   => data_get($location, 'admin_country'),
            'postcode'  => data_get($location, 'postcode'),
            'country'   => data_get($location, 'country'),
        ];
    }
}
