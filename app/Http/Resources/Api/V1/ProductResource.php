<?php
declare(strict_types=1);

namespace App\Http\Resources\Api\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  Request  $request
     * @return array
     */
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'type' => 'product',
            'attributes' => [
                'key' => $this->key,
                'name' => $this->name,
                'description' => $this->description,
                'price' => [
                    'cost' => $this->cost,
                    'retail' => $this->retail,
                ],
                'active' => $this->active,
                'vat' => $this->vat,
            ],
            'relationships' => [
                'category' => new CategoryResource($this->whenLoaded('category')),
                'range' => new RangeResource($this->whenLoaded('range')),
                'variants' => VariantResource::collection($this->whenLoaded('variants')),
            ],
            'links' => [
                '_self' => route('api.v1.products.show', $this->key),
                '_parent' => route('api.v1.products.all'),
            ]
        ];
    }
}
