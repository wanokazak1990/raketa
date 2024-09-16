<?php

namespace App\Http\Resources\Product;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'options' => $this->values->map(function($item){
                return [
                    'option' => [
                        'id' => $item->option->id,
                        'name' => $item->option->name,
                        'value' => [
                            'id' => $item->id,
                            'name' => $item->name,
                        ],
                    ],
                ];
            })
        ];
    }
}
