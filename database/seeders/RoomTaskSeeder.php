<?php

namespace Database\Seeders;

use App\Models\Filial;
use App\Models\Room;
use App\Models\RoomTask;
use App\Models\RoomTasks;
use Illuminate\Database\Seeder;

class RoomTaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'name' => '1-task',
                'filial_id' => Filial::select('id')->inRandomOrder()->first()->id,
                'status' => 1,
            ],
            [
                'name' => "2-task",
                'filial_id' => Filial::select('id')->inRandomOrder()->first()->id,
                'status' => 1,
            ],
            [
                'name' => "3-task",
                'filial_id' => Filial::select('id')->inRandomOrder()->first()->id,
                'status' => 1,
            ],
            [
                'name' => "4-task",
                'filial_id' => Filial::select('id')->inRandomOrder()->first()->id,
                'status' => 1,
            ],
            [
                'name' => "5-task",
                'filial_id' => Filial::select('id')->inRandomOrder()->first()->id,
                'status' => 1,
            ],
            [
                'name' => "6-task",
                'filial_id' => Filial::select('id')->inRandomOrder()->first()->id,
                'status' => 1,
            ],
            [
                'name' => "7-task",
                'filial_id' => Filial::select('id')->inRandomOrder()->first()->id,
                'status' => 1,
            ],
            [
                'name' => "8-task",
                'filial_id' => Filial::select('id')->inRandomOrder()->first()->id,
                'status' => 1,
            ],
            [
                'name' => "9-task",
                'filial_id' => Filial::select('id')->inRandomOrder()->first()->id,
                'status' => 1,
            ],
            [
                'name' => "10-task",
                'filial_id' => Filial::select('id')->inRandomOrder()->first()->id,
                'status' => 1,
            ],
            [
                'name' => "11-task",
                'filial_id' => Filial::select('id')->inRandomOrder()->first()->id,
                'status' => 1,
            ],
        ];

        foreach ($data as $d){
            RoomTasks::create($d);
        }
    }
}
