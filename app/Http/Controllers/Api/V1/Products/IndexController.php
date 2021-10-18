<?php
declare(strict_types=1);

namespace App\Http\Controllers\Api\V1\Products;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\V1\ProductResource;
use Domains\Catalog\Models\Product;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use JustSteveKing\StatusCode\Http;
use Spatie\QueryBuilder\QueryBuilder;

class IndexController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  Request  $request
     * @return JsonResponse
     */
    public function __invoke(Request $request): JsonResponse
    {
        $products = QueryBuilder::for(Product::class)
            ->allowedIncludes(['category', 'range', 'variants'])
            ->allowedFilters(['active', 'vat'])
            ->paginate(10);

        return response()->json(ProductResource::collection($products), Http::OK);
    }
}

