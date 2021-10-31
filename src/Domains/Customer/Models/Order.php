<?php
declare(strict_types=1);

namespace Domains\Customer\Models;

use Database\Factories\OrderFactory;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use JustSteveKing\KeyFactory\Models\Concerns\HasKey;

class Order extends Model
{
    use HasFactory, HasKey;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'key',
        'number',
        'state',
        'coupon',
        'total',
        'reduction',
        'user_id',
        'shipping_id',
        'billing_id',
        'completed_at',
        'cancelled_at',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'completed_at' => 'timestamp',
        'cancelled_at' => 'timestamp'
    ];

    /**
     * Shipping relationship
     *
     * @return BelongsTo
     */
    public function shipping(): BelongsTo
    {
        return $this->belongsTo(Location::class);
    }

    /**
     * Billing relationship
     *
     * @return BelongsTo
     */
    public function billing(): BelongsTo
    {
        return $this->belongsTo(Location::class);
    }

    /**
     * User relationship
     *
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Line item relationship
     *
     * @return HasMany
     */
    public function lineItems(): HasMany
    {
        return $this->hasMany(OrderLine::class);
    }

    /**
     * Create a new factory instance for the model.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    protected static function newFactory(): Factory
    {
        return OrderFactory::new();
    }
}
