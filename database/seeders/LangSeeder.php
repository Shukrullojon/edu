<?php

namespace Database\Seeders;

use App\Models\Filial;
use App\Models\Lang;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'name' => 'Uzbek',
                'filial_id' => Filial::select('id')->inRandomOrder()->first()->id,
                'status' => 1,
            ],
            [
                'name' => 'Russian',
                'filial_id' => Filial::select('id')->inRandomOrder()->first()->id,
                'status' => 1,
            ],
            [
                'name' => 'Turkish',
                'filial_id' => Filial::select('id')->inRandomOrder()->first()->id,
                'status' => 1,
            ],
        ];
        foreach ($data as $d){
            Lang::create($d);
        }
    }
}
