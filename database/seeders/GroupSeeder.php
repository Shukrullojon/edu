<?php

namespace Database\Seeders;

use App\Models\Cource;
use App\Models\Day;
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
                'type' => json_encode(Day::select('id')->inRandomOrder()->first()->id),
                'start_date' => date('Y-m-d', strtotime("+".rand(1,10).' days'),),
                'start_hour' => date('H:i', strtotime("+".rand(1,10).' days'),),
                'cource_id' => Cource::select('id')->inRandomOrder()->first()->id,
                'filial_id' => Filial::select('id')->inRandomOrder()->first()->id,
                'max_student' => 15,
                'status' => rand(1,3),
                'color' => rand(100000,999999),
            ],
            [
                'name' => '2-group',
                'type' => json_encode(Day::select('id')->inRandomOrder()->first()->id),
                'start_date' => date('Y-m-d', strtotime("+".rand(1,10).' days'),),
                'start_hour' => date('H:i', strtotime("+".rand(1,10).' days'),),
                'cource_id' => Cource::select('id')->inRandomOrder()->first()->id,
                'filial_id' => Filial::select('id')->inRandomOrder()->first()->id,
                'max_student' => 15,
                'status' => rand(1,3),
                'color' => rand(100000,999999),
            ],
            [
                'name' => '3-group',
                'type' => json_encode(Day::select('id')->inRandomOrder()->first()->id),
                'start_date' => date('Y-m-d', strtotime("+".rand(1,10).' days'),),
                'start_hour' => date('H:i', strtotime("+".rand(1,10).' days'),),
                'cource_id' => Cource::select('id')->inRandomOrder()->first()->id,
                'filial_id' => Filial::select('id')->inRandomOrder()->first()->id,
                'max_student' => 15,
                'status' => rand(1,3),
                'color' => rand(100000,999999),
            ],
            [
                'name' => '4-group',
                'type' => json_encode(Day::select('id')->inRandomOrder()->first()->id),
                'start_date' => date('Y-m-d', strtotime("+".rand(1,10).' days'),),
                'start_hour' => date('H:i', strtotime("+".rand(1,10).' days'),),
                'cource_id' => Cource::select('id')->inRandomOrder()->first()->id,
                'filial_id' => Filial::select('id')->inRandomOrder()->first()->id,
                'max_student' => 15,
                'status' => rand(1,3),
                'color' => rand(100000,999999),
            ],
            [
                'name' => '5-group',
                'type' => json_encode(Day::select('id')->inRandomOrder()->first()->id),
                'start_date' => date('Y-m-d', strtotime("+".rand(1,10).' days'),),
                'start_hour' => date('H:i', strtotime("+".rand(1,10).' days'),),
                'cource_id' => Cource::select('id')->inRandomOrder()->first()->id,
                'filial_id' => Filial::select('id')->inRandomOrder()->first()->id,
                'max_student' => 15,
                'status' => rand(1,3),
                'color' => rand(100000,999999),
            ],
            [
                'name' => '6-group',
                'type' => json_encode(Day::select('id')->inRandomOrder()->first()->id),
                'start_date' => date('Y-m-d', strtotime("+".rand(1,10).' days'),),
                'start_hour' => date('H:i', strtotime("+".rand(1,10).' days'),),
                'cource_id' => Cource::select('id')->inRandomOrder()->first()->id,
                'filial_id' => Filial::select('id')->inRandomOrder()->first()->id,
                'max_student' => 15,
                'status' => rand(1,3),
                'color' => rand(100000,999999),
            ],
            [
                'name' => '7-group',
                'type' => json_encode(Day::select('id')->inRandomOrder()->first()->id),
                'start_date' => date('Y-m-d', strtotime("+".rand(1,10).' days'),),
                'start_hour' => date('H:i', strtotime("+".rand(1,10).' days'),),
                'cource_id' => Cource::select('id')->inRandomOrder()->first()->id,
                'filial_id' => Filial::select('id')->inRandomOrder()->first()->id,
                'max_student' => 15,
                'status' => rand(1,3),
                'color' => rand(100000,999999),
            ],
            [
                'name' => '8-group',
                'type' => json_encode(Day::select('id')->inRandomOrder()->first()->id),
                'start_date' => date('Y-m-d', strtotime("+".rand(1,10).' days'),),
                'start_hour' => date('H:i', strtotime("+".rand(1,10).' days'),),
                'cource_id' => Cource::select('id')->inRandomOrder()->first()->id,
                'filial_id' => Filial::select('id')->inRandomOrder()->first()->id,
                'max_student' => 15,
                'status' => rand(1,3),
                'color' => rand(100000,999999),
            ],
            [
                'name' => '9-group',
                'type' => json_encode(Day::select('id')->inRandomOrder()->first()->id),
                'start_date' => date('Y-m-d', strtotime("+".rand(1,10).' days'),),
                'start_hour' => date('H:i', strtotime("+".rand(1,10).' days'),),
                'cource_id' => Cource::select('id')->inRandomOrder()->first()->id,
                'filial_id' => Filial::select('id')->inRandomOrder()->first()->id,
                'max_student' => 15,
                'status' => rand(1,3),
                'color' => rand(100000,999999),
            ],
            [
                'name' => '10-group',
                'type' => json_encode(Day::select('id')->inRandomOrder()->first()->id),
                'start_date' => date('Y-m-d', strtotime("+".rand(1,10).' days'),),
                'start_hour' => date('H:i', strtotime("+".rand(1,10).' days'),),
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
