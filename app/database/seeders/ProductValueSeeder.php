<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Value;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductValueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('product_values')->delete();

        $products = Product::get();
        $values = Value::get()->chunk(3);

        foreach($products as $itemProduct)
            foreach($values as $chunk)
            {
                $chunk = $chunk->values();
                DB::table('product_values')->insert([
                    'product_id' => $itemProduct->id,
                    'value_id' => $chunk[rand(0,2)]->id
                ]);
            }
    }
}
