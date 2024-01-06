<?php

namespace Database\Seeders;

use App\Models\Group;
use App\Models\GroupDetail;
use App\Models\Room;
use App\Models\User;
use Illuminate\Database\Seeder;

class GroupDetailsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 0; $i < 100; $i++) {
            $time = rand(10, 24);
            GroupDetail::firstOrCreate(
                [
                    'room_id' => Room::select('id')->inRandomOrder()->first()->id,
                ],
                [
                    'teacher_id' => User::select('id')->inRandomOrder()->first()->id,
                    'group_id' => Group::select('id')->inRandomOrder()->first()->id,
                    'begin_time' => $time.':00',
                    'end_time' => $time++.':00',
                    'status' => 1,
                ]
            );
        }
    }
}
