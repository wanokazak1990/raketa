<?php

namespace App\Http\Filters;

use Illuminate\Database\Eloquent\Builder;

Class ProductFilter extends AbstractFilter
{
    public const PROPERTIES = 'properties';
    public const AMOUNT = 'amount';
    public const INIT = 'init';



    public function __construct(array $queryParams)
    {
        $queryParams['init'] = 'init';
        parent::__construct($queryParams);
    }



    protected function getCallbacks() : array
    {
        return [
            self::INIT                => [$this, 'init'],
            self::PROPERTIES          => [$this, 'propertiesId'],
            self::AMOUNT              => [$this, 'amount'],
        ];
    }



    public function init(Builder $builder)
    {
        $builder->leftJoin('product_values', 'product_values.product_id', 'products.id');
        $builder->leftJoin('values', 'values.id', 'product_values.value_id');
        $builder->leftJoin('option_values', 'option_values.value_id', 'values.id');
        $builder->leftJoin('options', 'options.id', 'option_values.option_id');
        $builder->groupBy('products.id');
    }



    public function amount(Builder $builder, $value)
    {
        $builder->where('products.amount', '>', $value);
    }



    public function propertiesId(Builder $builder, array $data)
    {
        $builder->where(function($group) use ($data){
            foreach($data as $optionId => $valuesArr)
                $group->orWhere(function($builderOption) use ($optionId, $valuesArr){
                    $builderOption->Where('options.id', $optionId)
                        ->Where(function($builderValue) use($valuesArr){
                            foreach($valuesArr as $valueId)
                                $builderValue->orWhere('values.id', $valueId);
                    });
                });
            });
            
        $builder->havingRaw('count(*) > '.(count($data)-1));
    }
}