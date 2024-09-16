<?php

namespace App\Repositories\Product;

use App\Http\Filters\ProductFilter;
use App\Models\Product;

Class ProductRepository
{
    public function paginate(array $data, $amount = 40)
    {       
        $query = Product::query()
            ->select('products.*')
            ->with(['values.option']);
           
        $filter = app()->make(ProductFilter::class, ['queryParams' => array_filter($data)]);
        
        $products = $query->filter($filter)->paginate($amount);

        return $products;
    }
}