<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('products')->delete();

        for($i=0;$i<10;$i++)
            DB::table('products')->insert([
                'id' => ($i+1),
                'name' => 'Люcтра '.($i+1).'-'.rand(100,900),
                'price' => rand(100, 1000),
                'amount' => rand(0, 30),
            ]);
    }
}
