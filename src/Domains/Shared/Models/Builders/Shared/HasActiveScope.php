<?php
declare(strict_types=1);

namespace Domains\Shared\Models\Builders\Shared;

use Illuminate\Database\Eloquent\Builder;

trait HasActiveScope
{
    /**
     * Get the active records
     *
     * @return Builder
     */
    public function active(): Builder
    {
        $this->where('active', true);
    }

    /**
     * Get the inactive records
     *
     * @return Builder
     */
    public function inactive(): Builder
    {
        $this->where('active', false);
    }
}
