<?php
declare(strict_types=1);

namespace Domains\Customer\Models;

use Database\Factories\CartItemFactory;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use JustSteveKing\KeyFactory\Models\Concerns\HasKey;

class CartItem extends Model
{
    use HasFactory, HasKey;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'key',
        'purchasable_id',
        'purchasable_type',
        'cart_id',
    ];

    /**
     * Cart relationship
     *
     * @return BelongsTo
     */
    public function cart()
    {
        return $this->belongsTo(Cart::class);
    }

    /**
     * Purchasable relationship
     *
     * @return MorphTo
     */
    public function purchasable(): MorphTo
    {
        return $this->morphTo();
    }

    /**
     * Create a new factory instance for the model.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    protected static function newFactory(): Factory
    {
        return CartItemFactory::new();
    }
}
