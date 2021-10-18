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
     * @return Builder
     */
    public function physical(): Builder
    {
        $this->where('shippable', true);
    }

    /**
     * Get the digital products
     *
     * @return Builder
     */
    public function digital(): Builder
    {
        $this->where('shippable', false);
    }

    /**
     * Get the downloadable products
     *
     * @return Builder
     */
    public function downloadable(): Builder
    {
        $this->digital();
    }
}
