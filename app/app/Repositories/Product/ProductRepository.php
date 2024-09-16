<?php

namespace App\Repositories\Product;

use App\Models\Product;

Class ProductRepository
{
    public function paginate(array $data, $amount = 2)
    {       
        $query = Product::query()->select('products.*');

        $query->leftJoin('product_values', 'product_values.product_id', 'products.id');
        $query->leftJoin('values', 'values.id', 'product_values.value_id');
        $query->leftJoin('option_values', 'option_values.value_id', 'values.id');
        $query->leftJoin('options', 'options.id', 'option_values.option_id');
        $query->groupBy('products.id');

        $query->where('products.amount', '>', 0);

        $query->where(function($group) use ($data){
        foreach($data['options'] as $optionId => $valuesArr)
            $group->orWhere(function($builderOption) use ($optionId, $valuesArr){
                $builderOption->Where('options.id', $optionId)
                    ->Where(function($builderValue) use($valuesArr){
                        foreach($valuesArr as $valueId)
                            $builderValue->orWhere('values.id', $valueId);
                });
            });
        });

        $query->havingRaw('count(*) > '.(count($data['options'])-1));
        
        $products = $query->paginate($amount);

        return $products;
    }
}