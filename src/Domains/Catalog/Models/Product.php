<?php
declare(strict_types=1);

namespace Domains\Catalog\Models;

use Database\Factories\ProductFactory;
use Domains\Catalog\Models\Builders\ProductBuilder;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use JustSteveKing\KeyFactory\Models\Concerns\HasKey;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
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
        'description',
        'cost',
        'retail',
        'active',
        'vat',
        'category_id',
        'range_id',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'active' => 'boolean',
        'vat'    => 'boolean',
    ];

    /**
     * Category relationship
     *
     * @return BelongsTo
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Range relationship
     *
     * @return BelongsTo
     */
    public function range(): BelongsTo
    {
        return $this->belongsTo(Range::class);
    }

    /**
     * Variants relationship
     *
     * @return HasMany
     */
    public function variants(): HasMany
    {
        return $this->hasMany(Variant::class);
    }

    /**
     * Determine the builder to product
     *
     * @param $query
     * @return Builder
     */
    public function newEloquentBuilder($query): Builder
    {
        return new ProductBuilder($query);
    }

    /**
     * Create a new factory instance for the model.
     *
     * @return Factory
     */
    protected static function newFactory(): Factory
    {
        return ProductFactory::new();
    }
}
