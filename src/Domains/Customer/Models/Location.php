<?php
declare(strict_types=1);

namespace Domains\Customer\Models;

use Database\Factories\LocationFactory;
use Illuminate\Database\Eloquent\Model;
use Domains\Customer\Models\Concerns\HasUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use \Illuminate\Database\Eloquent\Factories\Factory;

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
     * Addresses relation
     *
     * @return HasMany
     */
    public function addresses(): HasMany
    {
        return $this->hasMany(Address::class);
    }

    /**
     * Create a new factory instance for the model.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    protected static function newFactory(): Factory
    {
       return new LocationFactory();
    }
}
