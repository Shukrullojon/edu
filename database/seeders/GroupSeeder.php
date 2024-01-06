<?php

namespace Database\Seeders;

use App\Models\Cource;
use App\Models\DayType;
use App\Models\Filial;
use App\Models\Group;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'name' => '1-group',
                'type' => DayType::select('id')->inRandomOrder()->first()->id,
                'start_time' => date('Y-m-d H:i:s', strtotime("+".rand(1,10).' days'),),
                'cource_id' => Cource::select('id')->inRandomOrder()->first()->id,
                'filial_id' => Filial::select('id')->inRandomOrder()->first()->id,
                'max_student' => 15,
                'status' => rand(1,3),
                'color' => rand(100000,999999),
            ],
            [
                'name' => '2-group',
                'type' => DayType::select('id')->inRandomOrder()->first()->id,
                'start_time' => date('Y-m-d H:i:s', strtotime("+".rand(1,10).' days'),),
                'cource_id' => Cource::select('id')->inRandomOrder()->first()->id,
                'filial_id' => Filial::select('id')->inRandomOrder()->first()->id,
                'max_student' => 15,
                'status' => rand(1,3),
                'color' => rand(100000,999999),
            ],
            [
                'name' => '3-group',
                'type' => DayType::select('id')->inRandomOrder()->first()->id,
                'start_time' => date('Y-m-d H:i:s', strtotime("+".rand(1,10).' days'),),
                'cource_id' => Cource::select('id')->inRandomOrder()->first()->id,
                'filial_id' => Filial::select('id')->inRandomOrder()->first()->id,
                'max_student' => 15,
                'status' => rand(1,3),
                'color' => rand(100000,999999),
            ],
            [
                'name' => '4-group',
                'type' => DayType::select('id')->inRandomOrder()->first()->id,
                'start_time' => date('Y-m-d H:i:s', strtotime("+".rand(1,10).' days'),),
                'cource_id' => Cource::select('id')->inRandomOrder()->first()->id,
                'filial_id' => Filial::select('id')->inRandomOrder()->first()->id,
                'max_student' => 15,
                'status' => rand(1,3),
                'color' => rand(100000,999999),
            ],
            [
                'name' => '5-group',
                'type' => DayType::select('id')->inRandomOrder()->first()->id,
                'start_time' => date('Y-m-d H:i:s', strtotime("+".rand(1,10).' days'),),
                'cource_id' => Cource::select('id')->inRandomOrder()->first()->id,
                'filial_id' => Filial::select('id')->inRandomOrder()->first()->id,
                'max_student' => 15,
                'status' => rand(1,3),
                'color' => rand(100000,999999),
            ],
            [
                'name' => '6-group',
                'type' => DayType::select('id')->inRandomOrder()->first()->id,
                'start_time' => date('Y-m-d H:i:s', strtotime("+".rand(1,10).' days'),),
                'cource_id' => Cource::select('id')->inRandomOrder()->first()->id,
                'filial_id' => Filial::select('id')->inRandomOrder()->first()->id,
                'max_student' => 15,
                'status' => rand(1,3),
                'color' => rand(100000,999999),
            ],
            [
                'name' => '7-group',
                'type' => DayType::select('id')->inRandomOrder()->first()->id,
                'start_time' => date('Y-m-d H:i:s', strtotime("+".rand(1,10).' days'),),
                'cource_id' => Cource::select('id')->inRandomOrder()->first()->id,
                'filial_id' => Filial::select('id')->inRandomOrder()->first()->id,
                'max_student' => 15,
                'status' => rand(1,3),
                'color' => rand(100000,999999),
            ],
            [
                'name' => '8-group',
                'type' => DayType::select('id')->inRandomOrder()->first()->id,
                'start_time' => date('Y-m-d H:i:s', strtotime("+".rand(1,10).' days'),),
                'cource_id' => Cource::select('id')->inRandomOrder()->first()->id,
                'filial_id' => Filial::select('id')->inRandomOrder()->first()->id,
                'max_student' => 15,
                'status' => rand(1,3),
                'color' => rand(100000,999999),
            ],
            [
                'name' => '9-group',
                'type' => DayType::select('id')->inRandomOrder()->first()->id,
                'start_time' => date('Y-m-d H:i:s', strtotime("+".rand(1,10).' days'),),
                'cource_id' => Cource::select('id')->inRandomOrder()->first()->id,
                'filial_id' => Filial::select('id')->inRandomOrder()->first()->id,
                'max_student' => 15,
                'status' => rand(1,3),
                'color' => rand(100000,999999),
            ],
            [
                'name' => '10-group',
                'type' => DayType::select('id')->inRandomOrder()->first()->id,
                'start_time' => date('Y-m-d H:i:s', strtotime("+".rand(1,10).' days'),),
                'cource_id' => Cource::select('id')->inRandomOrder()->first()->id,
                'filial_id' => Filial::select('id')->inRandomOrder()->first()->id,
                'max_student' => 15,
                'status' => rand(1,3),
                'color' => rand(100000,999999),
            ],
        ];
        foreach ($data as $d){
            Group::create($d);
        }
    }
}
