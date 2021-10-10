<?php
declare(strict_types=1);

namespace Domains\Customer\Models;

use Database\Factories\LocationFactory;
use Illuminate\Database\Eloquent\Model;
use Domains\Customer\Models\Concerns\HasUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Location extends Model
{
    use HasFactory, HasUuid;

    protected $fillable = [
        'uuid',
        'house',
        'street',
        'parish',
        'ward',
        'district',
        'country',
        'postcode',
    ];

    /**
     * Create a new factory instance for the model.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    protected static function newFactory()
    {
       return new LocationFactory();
    }
}
