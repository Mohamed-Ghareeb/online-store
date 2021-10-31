<?php
declare(strict_types=1);

namespace Domains\Catalog\Models;

use Database\Factories\VariantFactory;
use Domains\Customer\Models\CartItem;
use Domains\Customer\Models\OrderLine;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use JustSteveKing\KeyFactory\Models\Concerns\HasKey;

class Variant extends Model
{
    use HasFactory, HasKey;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'key',
        'name',
        'cost',
        'retail',
        'height',
        'width',
        'length',
        'weight',
        'active',
        'shippable',
        'product_id',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'active'    => 'boolean',
        'shippable' => 'boolean',
    ];

    /**
     * Product relationship
     *
     * @return BelongsTo
     */
    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    /**
     * Purchases for cart items relationship
     *
     * @return MorphMany
     */
    public function purchases(): MorphMany
    {
        return $this->morphMany(CartItem::class, 'purchasable');
    }

    /**
     * Purchases for orders relationship
     *
     * @return MorphMany
     */
    public function orders(): MorphMany
    {
        return $this->morphMany(OrderLine::class, 'purchasable');
    }

    /**
     * Create a new factory instance for the model.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    protected static function newFactory(): Factory
    {
        return VariantFactory::new();
    }
}
