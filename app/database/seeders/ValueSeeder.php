<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ValueSeeder extends Seeder
{
    private const VALUES = [
        'Настенная', 'Потолочная', 'Врезная', 
        'Красная', 'Желтая', 'Синяя', 
        'Светодиодная', 'Галогенновая', 'Ксеноновая', 
        '220в', '24в', '12в'
    ];

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $arr = self::VALUES;

        DB::table('values')->delete();

        foreach($arr as $key => $itemValue)
            DB::table('values')->insert([
                'id' => ($key+1),
                'name' => $itemValue,
            ]);
    }
}
