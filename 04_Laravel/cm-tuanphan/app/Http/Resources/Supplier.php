<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class Supplier extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $supplier = parent::toArray($request);
        unset($supplier["products"]);
        return [
            'supplier' => $supplier,
            'product_ids' => $this->products->pluck('product_id'),
        ];
    }
}
