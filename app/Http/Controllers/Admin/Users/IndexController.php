<?php
declare(strict_types=1);

namespace App\Http\Controllers\Admin\Users;

use App\Http\Controllers\Controller;
use Domains\Catalog\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Spatie\QueryBuilder\QueryBuilder;

class IndexController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param Request $request
     * @return array
     */
    public function __invoke(Request $request): array
    {
        return [];
    }
}
