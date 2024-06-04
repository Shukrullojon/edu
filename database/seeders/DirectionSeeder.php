<?php

namespace Database\Seeders;

use App\Models\Direction;
use App\Models\Filial;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DirectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'id' => 1,
                'name' => 'Grammer',
                'filial_id' => Filial::select('id')->inRandomOrder()->first()->id,
            ],
            [
                'id' => 2,
                'name' => 'Vocabulary',
                'filial_id' => Filial::select('id')->inRandomOrder()->first()->id,
            ],
            [
                'id' => 3,
                'name' => 'Listening',
                'filial_id' => Filial::select('id')->inRandomOrder()->first()->id,
            ],
            [
                'id' => 4,
                'name' => 'Speaking',
                'filial_id' => Filial::select('id')->inRandomOrder()->first()->id,
            ],
            [
                'id' => 5,
                'name' => 'General',
                'filial_id' => Filial::select('id')->inRandomOrder()->first()->id,
            ],
            [
                'id' => 6,
                'name' => 'Ielts',
                'filial_id' => Filial::select('id')->inRandomOrder()->first()->id,
            ],
        ];
        foreach ($data as $d) {
            Direction::create($d);
        }
    }
}
