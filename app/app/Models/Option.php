<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
    use HasFactory;

    public function values()
    {
        return $this->belongsToMany(Value::class, 'option_values', 'option_id', 'value_id');
    }
}
