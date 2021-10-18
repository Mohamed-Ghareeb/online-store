<?php
declare(strict_types=1);

namespace Domains\Shared\Models\Builders\Shared;

trait HasActiveScope
{
    /**
     * Get the active records
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function active(): Builder
    {
        $this->where('active', true);
    }

    /**
     * Get the inactive records
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function inactive(): Builder
    {
        $this->where('active', false);
    }
}
