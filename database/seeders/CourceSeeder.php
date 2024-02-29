<?php

namespace Database\Seeders;

use App\Models\Cource;
use App\Models\Filial;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CourceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'name' => 'Ingliz tili oyiga 480 000 UZS',
                'time' => 90,
                'during' => 18,
                'info' => 'Cource',
                'filial_id' => Filial::select('id')->inRandomOrder()->first()->id,
                'status' => 1,
                'price' => 480000,
                'one_price' => 40000,
            ],
            [
                'name' => 'INGLIZ TILI 3 OYDA',
                'time' => 180,
                'during' => 3,
                'info' => 'Cource',
                'filial_id' => Filial::select('id')->inRandomOrder()->first()->id,
                'status' => 1,
                'price' => 2580000,
                'one_price' => 215000,
            ],
            [
                'name' => 'IELTS INTENSIV ',
                'time' => 120,
                'during' => 2,
                'info' => 'Cource',
                'filial_id' => Filial::select('id')->inRandomOrder()->first()->id,
                'status' => 1,
                'price' => 1440000,
                'one_price' => 120000,
            ],
        ];
        foreach ($data as $d){
            Cource::create($d);
        }
    }
}
