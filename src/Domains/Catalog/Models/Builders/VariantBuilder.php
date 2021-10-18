<?php
declare(strict_types=1);

namespace Domains\Catalog\Models\Builders;

use Domains\Shared\Models\Builders\Shared\HasActiveScope;
use Illuminate\Database\Eloquent\Builder;

class VariantBuilder extends Builder
{
    use HasActiveScope;

    /**
     * Get the physical products
     *
     * @return self
     */
    public function physical(): self
    {
        return $this->where('shippable', true);
    }

    /**
     * Get the digital products
     *
     * @return self
     */
    public function digital(): self
    {
        return $this->where('shippable', false);
    }

    /**
     * Get the downloadable products
     *
     * @return self
     */
    public function downloadable(): self
    {
        return $this->digital();
    }
}
