<?php

namespace Database\Seeders;

use App\Models\Option;
use App\Models\Value;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OptionValueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('option_values')->delete();

        $options = Option::get();
        $values = Value::get()->chunk(3);

        foreach($options as $key => $itemOption)
            foreach($values[$key] as $itemValue)
                DB::table('option_values')->insert([
                    'option_id' => $itemOption->id,
                    'value_id' => $itemValue->id,
                ]);
         
    }
}
