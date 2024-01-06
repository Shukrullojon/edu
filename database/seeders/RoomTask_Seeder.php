<?php

namespace Database\Seeders;

use App\Models\Room;
use App\Models\RoomRoomTask;
use App\Models\RoomTasks;
use Illuminate\Database\Seeder;

class RoomTask_Seeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 0; $i < 10; $i++){
            RoomRoomTask::create([
                'room_id' => Room::select('id')->inRandomOrder()->first()->id,
                'room_tasks_id' => RoomTasks::select('id')->inRandomOrder()->first()->id,
            ]);
        }
    }
}
