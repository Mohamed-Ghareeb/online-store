<?php
declare(strict_types=1);

namespace Domains\Shared\Models\Builders\Shared;

use Domains\Catalog\Models\Builders\CategoryBuilder;
use Domains\Catalog\Models\Builders\ProductBuilder;
use Domains\Catalog\Models\Builders\RangeBuilder;
use Domains\Catalog\Models\Builders\VariantBuilder;

trait HasActiveScope
{
    /**
     * Get the active records
     *
     * @return VariantBuilder|CategoryBuilder|ProductBuilder|RangeBuilder|HasActiveScope
     */
    public function active(): self
    {
        return $this->where('active', true);
    }

    /**
     * Get the inactive records
     *
     * @return VariantBuilder|CategoryBuilder|ProductBuilder|RangeBuilder|HasActiveScope
     */
    public function inactive(): self
    {
        return $this->where('active', false);
    }
}
