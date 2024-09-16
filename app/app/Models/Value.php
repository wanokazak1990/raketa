<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Value extends Model
{
    use HasFactory;

    public function option()
    {
        return $this->hasOneThrough(Option::class, OptionValue::class, 'value_id', 'id', 'id', 'option_id');
    }
}
