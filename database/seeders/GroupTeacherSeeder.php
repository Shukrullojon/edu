<?php

namespace Database\Seeders;

use App\Models\GroupTeacher;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GroupTeacherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $datas = [
            // 0403
            [
                'group_id' => 39,
                'room_id' => 10,
                'teacher_id' => 16,
                'direction_id' => 4,
                'day_id' => 3,
                'begin_time' => '15:00:00',
                'end_time' => '16:00:00',
                'status' => 1,
            ],
            [
                'group_id' => 39,
                'room_id' => 3,
                'teacher_id' => 7,
                'direction_id' => 2,
                'day_id' => 3,
                'begin_time' => '14:00:00',
                'end_time' => '15:00:00',
                'status' => 1,
            ],
            [
                'group_id' => 39,
                'room_id' => 2,
                'teacher_id' => 6,
                'direction_id' => 1,
                'day_id' => 3,
                'begin_time' => '16:00:00',
                'end_time' => '17:00:00',
                'status' => 1,
            ],
            // 0305
            [
                'group_id' => 38,
                'room_id' => 5,
                'teacher_id' => 2,
                'direction_id' => 2,
                'day_id' => 3,
                'begin_time' => '18:00:00',
                'end_time' => '19:00:00',
                'status' => 1,
            ],
            [
                'group_id' => 38,
                'room_id' => 3,
                'teacher_id' => 7,
                'direction_id' => 2,
                'day_id' => 3,
                'begin_time' => '17:00:00',
                'end_time' => '18:00:00',
                'status' => 1,
            ],
            [
                'group_id' => 38,
                'room_id' => 11,
                'teacher_id' => 12,
                'direction_id' => 4,
                'day_id' => 3,
                'begin_time' => '19:00:00',
                'end_time' => '20:00:00',
                'status' => 1,
            ],
            // 0302
            [
                'group_id' => 37,
                'room_id' => 3,
                'teacher_id' => 16,
                'direction_id' => 2,
                'day_id' => 3,
                'begin_time' => '17:00:00',
                'end_time' => '18:00:00',
                'status' => 1,
            ],
            [
                'group_id' => 37,
                'room_id' => 10,
                'teacher_id' => 16,
                'direction_id' => 4,
                'day_id' => 3,
                'begin_time' => '16:00:00',
                'end_time' => '17:00:00',
                'status' => 1,
            ],
            [
                'group_id' => 37,
                'room_id' => 5,
                'teacher_id' => 2,
                'direction_id' => 1,
                'day_id' => 3,
                'begin_time' => '18:00:00',
                'end_time' => '19:00:00',
                'status' => 1,
            ],
            // 0104
            [
                'group_id' => 36,
                'room_id' => 5,
                'teacher_id' => 2,
                'direction_id' => 1,
                'day_id' => 3,
                'begin_time' => '16:00:00',
                'end_time' => '17:00:00',
                'status' => 1,
            ],
            [
                'group_id' => 36,
                'room_id' => 3,
                'teacher_id' => 7,
                'direction_id' => 2,
                'day_id' => 3,
                'begin_time' => '15:00:00',
                'end_time' => '16:00:00',
                'status' => 1,
            ],
            [
                'group_id' => 36,
                'room_id' => 10,
                'teacher_id' => 16,
                'direction_id' => 4,
                'day_id' => 3,
                'begin_time' => '17:00:00',
                'end_time' => '18:00:00',
                'status' => 1,
            ],
            // 1106
            [
                'group_id' => 35,
                'room_id' => 11,
                'teacher_id' => 16,
                'direction_id' => 4,
                'day_id' => 3,
                'begin_time' => '18:00:00',
                'end_time' => '19:00:00',
                'status' => 1,
            ],
            [
                'group_id' => 35,
                'room_id' => 2,
                'teacher_id' => 6,
                'direction_id' => 1,
                'day_id' => 3,
                'begin_time' => '17:00:00',
                'end_time' => '18:00:00',
                'status' => 1,
            ],
            [
                'group_id' => 35,
                'room_id' => 3,
                'teacher_id' => 7,
                'direction_id' => 2,
                'day_id' => 3,
                'begin_time' => '19:00:00',
                'end_time' => '20:00:00',
                'status' => 1,
            ],
            // 1206
            [
                'group_id' => 34,
                'room_id' => 3,
                'teacher_id' => 7,
                'direction_id' => 2,
                'day_id' => 3,
                'begin_time' => '16:00:00',
                'end_time' => '17:00:00',
                'status' => 1,
            ],
            [
                'group_id' => 34,
                'room_id' => 2,
                'teacher_id' => 6,
                'direction_id' => 1,
                'day_id' => 3,
                'begin_time' => '15:00:00',
                'end_time' => '16:00:00',
                'status' => 1,
            ],
            [
                'group_id' => 34,
                'room_id' => 6,
                'teacher_id' => 12,
                'direction_id' => 4,
                'day_id' => 3,
                'begin_time' => '17:00:00',
                'end_time' => '18:00:00',
                'status' => 1,
            ],
            // C-1107
            [
                'group_id' => 33,
                'room_id' => 13,
                'teacher_id' => 15,
                'direction_id' => 5,
                'day_id' => 3,
                'begin_time' => '18:30:00',
                'end_time' => '20:00:00',
                'status' => 1,
            ],
            // C-0802
            [
                'group_id' => 32,
                'room_id' => 13,
                'teacher_id' => 11,
                'direction_id' => 5,
                'day_id' => 3,
                'begin_time' => '17:00:00',
                'end_time' => '18:30:00',
                'status' => 1,
            ],
            // C-0503
            [
                'group_id' => 31,
                'room_id' => 13,
                'teacher_id' => 15,
                'direction_id' => 5,
                'day_id' => 3,
                'begin_time' => '09:30:00',
                'end_time' => '11:00:00',
                'status' => 1,
            ],
            // C-0404
            [
                'group_id' => 30,
                'room_id' => 8,
                'teacher_id' => 2,
                'direction_id' => 5,
                'day_id' => 3,
                'begin_time' => '18:30:00',
                'end_time' => '20:00:00',
                'status' => 1,
            ],
            // C-0402
            [
                'group_id' => 29,
                'room_id' => 8,
                'teacher_id' => 14,
                'direction_id' => 5,
                'day_id' => 3,
                'begin_time' => '15:30:00',
                'end_time' => '17:00:00',
                'status' => 1,
            ],
            // C-0304.1
            [
                'group_id' => 28,
                'room_id' => 6,
                'teacher_id' => 5,
                'direction_id' => 5,
                'day_id' => 3,
                'begin_time' => '15:30:00',
                'end_time' => '17:00:00',
                'status' => 1,
            ],
            // C-0507
            [
                'group_id' => 27,
                'room_id' => 4,
                'teacher_id' => 8,
                'direction_id' => 5,
                'day_id' => 3,
                'begin_time' => '06:00:00',
                'end_time' => '06:00:00',
                'status' => 1,
            ],
            // C-0203
            [
                'group_id' => 26,
                'room_id' => 4,
                'teacher_id' => 8,
                'direction_id' => 5,
                'day_id' => 3,
                'begin_time' => '17:00:00',
                'end_time' => '18:30:00',
                'status' => 1,
            ],
            // C-1005
            [
                'group_id' => 25,
                'room_id' => 4,
                'teacher_id' => 8,
                'direction_id' => 5,
                'day_id' => 3,
                'begin_time' => '15:30:00',
                'end_time' => '17:00:00',
                'status' => 1,
            ],
            // C-0202
            [
                'group_id' => 24,
                'room_id' => 4,
                'teacher_id' => 8,
                'direction_id' => 5,
                'day_id' => 3,
                'begin_time' => '14:00:00',
                'end_time' => '17:30:00',
                'status' => 1,
            ],
            // C-0306
            [
                'group_id' => 23,
                'room_id' => 2,
                'teacher_id' => 6,
                'direction_id' => 5,
                'day_id' => 3,
                'begin_time' => '18:30:00',
                'end_time' => '20:00:00',
                'status' => 1,
            ],
            // C-0210
            [
                'group_id' => 22,
                'room_id' => 1,
                'teacher_id' => 3,
                'direction_id' => 5,
                'day_id' => 3,
                'begin_time' => '18:30:00',
                'end_time' => '20:00:00',
                'status' => 1,
            ],
            // C-0117
            [
                'group_id' => 21,
                'room_id' => 1,
                'teacher_id' => 3,
                'direction_id' => 5,
                'day_id' => 3,
                'begin_time' => '17:00:00',
                'end_time' => '18:30:00',
                'status' => 1,
            ],
            // C-0115
            [
                'group_id' => 20,
                'room_id' => 1,
                'teacher_id' => 3,
                'direction_id' => 5,
                'day_id' => 3,
                'begin_time' => '15:30:00',
                'end_time' => '17:00:00',
                'status' => 1,
            ],
            // C-0401
            [
                'group_id' => 19,
                'room_id' => 2,
                'teacher_id' => 4,
                'direction_id' => 5,
                'day_id' => 3,
                'begin_time' => '10:00:00',
                'end_time' => '11:30:00',
                'status' => 1,
            ],
            // C-0304
            [
                'group_id' => 18,
                'room_id' => 2,
                'teacher_id' => 13,
                'direction_id' => 5,
                'day_id' => 2,
                'begin_time' => '17:00:00',
                'end_time' => '18:30:00',
                'status' => 1,
            ],
            // C-0704
            [
                'group_id' => 17,
                'room_id' => 13,
                'teacher_id' => 10,
                'direction_id' => 5,
                'day_id' => 2,
                'begin_time' => '18:30:00',
                'end_time' => '20:00:00',
                'status' => 1,
            ],
            // C-1201
            [
                'group_id' => 16,
                'room_id' => 6,
                'teacher_id' => 9,
                'direction_id' => 5,
                'day_id' => 2,
                'begin_time' => '15:30:00',
                'end_time' => '17:00:00',
                'status' => 1,
            ],
            // C-0906
            [
                'group_id' => 15,
                'room_id' => 4,
                'teacher_id' => 8,
                'direction_id' => 5,
                'day_id' => 2,
                'begin_time' => '18:30:00',
                'end_time' => '20:00:00',
                'status' => 1,
            ],
            // C-0103
            [
                'group_id' => 14,
                'room_id' => 3,
                'teacher_id' => 7,
                'direction_id' => 5,
                'day_id' => 2,
                'begin_time' => '18:30:00',
                'end_time' => '20:00:00',
                'status' => 1,
            ],
            // C-0205
            [
                'group_id' => 13,
                'room_id' => 1,
                'teacher_id' => 5,
                'direction_id' => 5,
                'day_id' => 2,
                'begin_time' => '18:30:00',
                'end_time' => '20:00:00',
                'status' => 1,
            ],
            // C-0905
            [
                'group_id' => 12,
                'room_id' => 4,
                'teacher_id' => 8,
                'direction_id' => 5,
                'day_id' => 2,
                'begin_time' => '17:00:00',
                'end_time' => '18:30:00',
                'status' => 1,
            ],
            // C-1003
            [
                'group_id' => 11,
                'room_id' => 3,
                'teacher_id' => 7,
                'direction_id' => 5,
                'day_id' => 2,
                'begin_time' => '17:00:00',
                'end_time' => '18:30:00',
                'status' => 1,
            ],
            // c-0405
            [
                'group_id' => 10,
                'room_id' => 1,
                'teacher_id' => 5,
                'direction_id' => 5,
                'day_id' => 2,
                'begin_time' => '17:00:00',
                'end_time' => '18:30:00',
                'status' => 1,
            ],
            // C-1102
            [
                'group_id' => 9,
                'room_id' => 4,
                'teacher_id' => 8,
                'direction_id' => 5,
                'day_id' => 2,
                'begin_time' => '15:30:00',
                'end_time' => '17:00:00',
                'status' => 1,
            ],
            // C-0102
            [
                'group_id' => 8,
                'room_id' => 3,
                'teacher_id' => 7,
                'direction_id' => 5,
                'day_id' => 2,
                'begin_time' => '15:30:00',
                'end_time' => '17:00:00',
                'status' => 1,
            ],
            // C-1002
            [
                'group_id' => 7,
                'room_id' => 4,
                'teacher_id' => 8,
                'direction_id' => 5,
                'day_id' => 2,
                'begin_time' => '14:00:00',
                'end_time' => '15:30:00',
                'status' => 1,
            ],
            // C-0602
            [
                'group_id' => 6,
                'room_id' => 3,
                'teacher_id' => 7,
                'direction_id' => 5,
                'day_id' => 2,
                'begin_time' => '14:00:00',
                'end_time' => '15:30:00',
                'status' => 1,
            ],
            // c-0101
            [
                'group_id' => 5,
                'room_id' => 6,
                'teacher_id' => 11,
                'direction_id' => 5,
                'day_id' => 2,
                'begin_time' => '10:30:00',
                'end_time' => '12:00:00',
                'status' => 1,
            ],
            // c-0201
            [
                'group_id' => 4,
                'room_id' => 2,
                'teacher_id' => 4,
                'direction_id' => 5,
                'day_id' => 2,
                'begin_time' => '10:30:00',
                'end_time' => '12:00:00',
                'status' => 1,
            ],
            // C-1101
            [
                'group_id' => 3,
                'room_id' => 15,
                'teacher_id' => 4,
                'direction_id' => 1,
                'day_id' => 2,
                'begin_time' => '09:00:00',
                'end_time' => '10:30:00',
                'status' => 1,
            ],
            // c-0301
            [
                'group_id' => 2,
                'room_id' => 6,
                'teacher_id' => 11,
                'direction_id' => 5,
                'day_id' => 2,
                'begin_time' => '09:00:00',
                'end_time' => '10:30:00',
                'status' => 1,
            ],
            // c-0904
            [
                'group_id' => 1,
                'room_id' => 1,
                'teacher_id' => 5,
                'direction_id' => 5,
                'day_id' => 2,
                'begin_time' => '06:00:00',
                'end_time' => '06:00:00',
                'status' => 1,
            ],
        ];
        foreach ($datas as $data){
            GroupTeacher::create($data);
        }
    }
}
