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

class ShowController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param Request $request
     * @param string $product_key
     * @return JsonResponse
     */
    public function __invoke(Request $request, string $product_key): JsonResponse
    {
        $product = QueryBuilder::for(Product::class)
            ->allowedIncludes(['category', 'range', 'variants'])
            ->active()
            ->where('key', $product_key)
            ->firstOrFail();

        return response()->json(new ProductResource($product), Http::OK);
    }
}
