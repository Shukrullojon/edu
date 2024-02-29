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
                'name' => 'c-1003',
                'start_date' => '2024-01-05',
                'start_hour' => '18:00:00',
                'cource_id' => Cource::select('id')->inRandomOrder()->first()->id,
                'filial_id' => Filial::select('id')->inRandomOrder()->first()->id,
                'max_student' => 15,
                'status' => 2,
                'color' => rand(100000,999999),
            ],
            [
                'name' => 'c-1005',
                'start_date' => '2024-01-05',
                'start_hour' => '18:30:00',
                'cource_id' => Cource::select('id')->inRandomOrder()->first()->id,
                'filial_id' => Filial::select('id')->inRandomOrder()->first()->id,
                'max_student' => 15,
                'status' => 2,
                'color' => rand(100000,999999),
            ],
            [
                'name' => 'c-1006',
                'start_date' => '2024-01-05',
                'start_hour' => '18:30:00',
                'cource_id' => Cource::select('id')->inRandomOrder()->first()->id,
                'filial_id' => Filial::select('id')->inRandomOrder()->first()->id,
                'max_student' => 15,
                'status' => 2,
                'color' => rand(100000,999999),
            ],
            /*[
                'name' => '4-group',
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
                'start_date' => date('Y-m-d', strtotime("+".rand(1,10).' days'),),
                'start_hour' => date('H:i', strtotime("+".rand(1,10).' days'),),
                'cource_id' => Cource::select('id')->inRandomOrder()->first()->id,
                'filial_id' => Filial::select('id')->inRandomOrder()->first()->id,
                'max_student' => 15,
                'status' => rand(1,3),
                'color' => rand(100000,999999),
            ],*/
        ];
        foreach ($data as $d){
            $g = Group::create($d);
            $g->day_create([Day::select('id')->inRandomOrder()->first()->id]);
        }
    }
}
