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
                'name' => 'Ingliz tili oyiga 400 000 UZS',
                'time' => 90,
                'during' => 18,
                'info' => 'Cource',
                'filial_id' => Filial::select('id')->inRandomOrder()->first()->id,
                'status' => 1,
                'price' => rand(500000,1000000),
                'one_price' => rand(500000,1000000)*0.1,
            ],
            [
                'name' => 'Английский язык + IELTS за 4 месяцев',
                'time' => 180,
                'during' => 4,
                'info' => 'Cource',
                'filial_id' => Filial::select('id')->inRandomOrder()->first()->id,
                'status' => 1,
                'price' => rand(500000,1000000),
                'one_price' => rand(500000,1000000)*0.1,
            ],
            [
                'name' => 'Английский язык + IELTS за 8 месяцев',
                'time' => 180,
                'during' => 8,
                'info' => 'Cource',
                'filial_id' => Filial::select('id')->inRandomOrder()->first()->id,
                'status' => 1,
                'price' => rand(500000,1000000),
                'one_price' => rand(500000,1000000)*0.1,
            ],
        ];
        foreach ($data as $d){
            Cource::create($d);
        }
    }
}
