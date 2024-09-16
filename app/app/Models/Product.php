<?php

namespace App\Models;

use App\Models\Traits\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory, Filterable;

    public function values()
    {
        return $this->belongsToMany(Value::class, 'product_values', 'product_id', 'value_id');
    }
}
