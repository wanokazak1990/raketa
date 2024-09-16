<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OptionSeeder extends Seeder
{
    private const OPTIONS = [
        'Тип', 'Цвет', 'Тип Лампы', 'Напряжение'
    ];

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $arr = self::OPTIONS;

        DB::table('options')->delete();

        foreach($arr as $key => $itemOption)
            DB::table('options')->insert([
                'id' => ($key+1),
                'name' => $itemOption,
            ]);
    }
}
