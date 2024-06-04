<?php

namespace Database\Seeders;

use App\Models\GroupStudent;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GroupStudentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $datas = [
            // C-0904
            [
                'group_id' => 1,
                'student_id' => 17,
                'status' => 1,
            ],
            [
                'group_id' => 1,
                'student_id' => 18,
                'status' => 1,
            ],
            // c-0301
            [
                'group_id' => 2,
                'student_id' => 19,
                'status' => 1,
            ],
            // C-1101
            [
                'group_id' => 3,
                'student_id' => 20,
                'status' => 1,
            ],
            [
                'group_id' => 3,
                'student_id' => 21,
                'status' => 1,
            ],
            [
                'group_id' => 3,
                'student_id' => 22,
                'status' => 1,
            ],
            [
                'group_id' => 3,
                'student_id' => 23,
                'status' => 1,
            ],
            // c-0201
            [
                'group_id' => 4,
                'student_id' => 24,
                'status' => 1,
            ],
            [
                'group_id' => 4,
                'student_id' => 25,
                'status' => 1,
            ],
            // c-0101
            [
                'group_id' => 5,
                'student_id' => 26,
                'status' => 1,
            ],
            [
                'group_id' => 5,
                'student_id' => 27,
                'status' => 1,
            ],
            // C-0602
            [
                'group_id' => 6,
                'student_id' => 28,
                'status' => 1,
            ],
            [
                'group_id' => 6,
                'student_id' => 29,
                'status' => 1,
            ],
            [
                'group_id' => 6,
                'student_id' => 30,
                'status' => 1,
            ],
            // C-1002
            [
                'group_id' => 7,
                'student_id' => 31,
                'status' => 1,
            ],
            [
                'group_id' => 7,
                'student_id' => 32,
                'status' => 1,
            ],
            [
                'group_id' => 7,
                'student_id' => 33,
                'status' => 1,
            ],
            // c-0102
            [
                'group_id' => 8,
                'student_id' => 34,
                'status' => 1,
            ],
            [
                'group_id' => 8,
                'student_id' => 35,
                'status' => 1,
            ],
            [
                'group_id' => 8,
                'student_id' => 36,
                'status' => 1,
            ],
            [
                'group_id' => 8,
                'student_id' => 37,
                'status' => 1,
            ],
            [
                'group_id' => 8,
                'student_id' => 38,
                'status' => 1,
            ],
            [
                'group_id' => 8,
                'student_id' => 39,
                'status' => 1,
            ],
            [
                'group_id' => 8,
                'student_id' => 40,
                'status' => 1,
            ],
            [
                'group_id' => 8,
                'student_id' => 41,
                'status' => 1,
            ],
            [
                'group_id' => 8,
                'student_id' => 42,
                'status' => 1,
            ],
            [
                'group_id' => 8,
                'student_id' => 43,
                'status' => 1,
            ],
            [
                'group_id' => 8,
                'student_id' => 44,
                'status' => 1,
            ],
            [
                'group_id' => 8,
                'student_id' => 45,
                'status' => 1,
            ],
            [
                'group_id' => 8,
                'student_id' => 46,
                'status' => 1,
            ],
            [
                'group_id' => 8,
                'student_id' => 47,
                'status' => 1,
            ],
            [
                'group_id' => 8,
                'student_id' => 48,
                'status' => 1,
            ],
            [
                'group_id' => 8,
                'student_id' => 49,
                'status' => 1,
            ],
            [
                'group_id' => 8,
                'student_id' => 50,
                'status' => 1,
            ],
            // C-1102
            [
                'group_id' => 9,
                'student_id' => 51,
                'status' => 1,
            ],
            [
                'group_id' => 9,
                'student_id' => 52,
                'status' => 1,
            ],
            [
                'group_id' => 9,
                'student_id' => 53,
                'status' => 1,
            ],
            [
                'group_id' => 9,
                'student_id' => 54,
                'status' => 1,
            ],
            [
                'group_id' => 9,
                'student_id' => 55,
                'status' => 1,
            ],
            [
                'group_id' => 9,
                'student_id' => 56,
                'status' => 1,
            ],
            [
                'group_id' => 9,
                'student_id' => 57,
                'status' => 1,
            ],
            [
                'group_id' => 9,
                'student_id' => 58,
                'status' => 1,
            ],
            // C-1003
            [
                'group_id' => 11,
                'student_id' => 59,
                'status' => 1,
            ],
            [
                'group_id' => 11,
                'student_id' => 60,
                'status' => 1,
            ],
            [
                'group_id' => 11,
                'student_id' => 61,
                'status' => 1,
            ],
            [
                'group_id' => 11,
                'student_id' => 62,
                'status' => 1,
            ],
            [
                'group_id' => 11,
                'student_id' => 63,
                'status' => 1,
            ],
            [
                'group_id' => 11,
                'student_id' => 64,
                'status' => 1,
            ],
            // C-0905
            [
                'group_id' => 12,
                'student_id' => 65,
                'status' => 1,
            ],
            [
                'group_id' => 12,
                'student_id' => 66,
                'status' => 1,
            ],
            [
                'group_id' => 12,
                'student_id' => 67,
                'status' => 1,
            ],
            [
                'group_id' => 12,
                'student_id' => 68,
                'status' => 1,
            ],
            [
                'group_id' => 12,
                'student_id' => 69,
                'status' => 1,
            ],
            [
                'group_id' => 12,
                'student_id' => 70,
                'status' => 1,
            ],
            [
                'group_id' => 12,
                'student_id' => 71,
                'status' => 1,
            ],
            // C-0205
            [
                'group_id' => 13,
                'student_id' => 72,
                'status' => 1,
            ],
            [
                'group_id' => 13,
                'student_id' => 73,
                'status' => 1,
            ],
            [
                'group_id' => 13,
                'student_id' => 74,
                'status' => 1,
            ],
            [
                'group_id' => 13,
                'student_id' => 75,
                'status' => 1,
            ],
            [
                'group_id' => 13,
                'student_id' => 76,
                'status' => 1,
            ],
            [
                'group_id' => 13,
                'student_id' => 77,
                'status' => 1,
            ],
            [
                'group_id' => 13,
                'student_id' => 78,
                'status' => 1,
            ],
            [
                'group_id' => 13,
                'student_id' => 79,
                'status' => 1,
            ],
            // C-0103
            [
                'group_id' => 14,
                'student_id' => 80,
                'status' => 1,
            ],
            [
                'group_id' => 14,
                'student_id' => 81,
                'status' => 1,
            ],
            [
                'group_id' => 14,
                'student_id' => 82,
                'status' => 1,
            ],
            [
                'group_id' => 14,
                'student_id' => 83,
                'status' => 1,
            ],
            [
                'group_id' => 14,
                'student_id' => 84,
                'status' => 1,
            ],
            [
                'group_id' => 14,
                'student_id' => 85,
                'status' => 1,
            ],
            [
                'group_id' => 14,
                'student_id' => 86,
                'status' => 1,
            ],
            [
                'group_id' => 14,
                'student_id' => 87,
                'status' => 1,
            ],
            [
                'group_id' => 14,
                'student_id' => 88,
                'status' => 1,
            ],
            [
                'group_id' => 14,
                'student_id' => 89,
                'status' => 1,
            ],
            [
                'group_id' => 14,
                'student_id' => 90,
                'status' => 1,
            ],
            // C-0906
            [
                'group_id' => 15,
                'student_id' => 91,
                'status' => 1,
            ],
            [
                'group_id' => 15,
                'student_id' => 92,
                'status' => 1,
            ],
            // C-1201
            [
                'group_id' => 16,
                'student_id' => 93,
                'status' => 1,
            ],
            [
                'group_id' => 16,
                'student_id' => 94,
                'status' => 1,
            ],
            [
                'group_id' => 16,
                'student_id' => 95,
                'status' => 1,
            ],
            [
                'group_id' => 16,
                'student_id' => 96,
                'status' => 1,
            ],
            [
                'group_id' => 16,
                'student_id' => 97,
                'status' => 1,
            ],
            [
                'group_id' => 16,
                'student_id' => 98,
                'status' => 1,
            ],
            [
                'group_id' => 16,
                'student_id' => 99,
                'status' => 1,
            ],
            [
                'group_id' => 16,
                'student_id' => 100,
                'status' => 1,
            ],
            [
                'group_id' => 16,
                'student_id' => 101,
                'status' => 1,
            ],
            // C-0704
            [
                'group_id' => 17,
                'student_id' => 102,
                'status' => 1,
            ],
            // C-0304
            [
                'group_id' => 18,
                'student_id' => 103,
                'status' => 1,
            ],
            [
                'group_id' => 18,
                'student_id' => 104,
                'status' => 1,
            ],
            // C-0401
            [
                'group_id' => 19,
                'student_id' => 105,
                'status' => 1,
            ],
            [
                'group_id' => 19,
                'student_id' => 106,
                'status' => 1,
            ],
            // C-0602
            [
                'group_id' => 20,
                'student_id' => 107,
                'status' => 1,
            ],
            [
                'group_id' => 20,
                'student_id' => 108,
                'status' => 1,
            ],
            [
                'group_id' => 20,
                'student_id' => 109,
                'status' => 1,
            ],
            [
                'group_id' => 20,
                'student_id' => 110,
                'status' => 1,
            ],
            [
                'group_id' => 20,
                'student_id' => 111,
                'status' => 1,
            ],
            [
                'group_id' => 20,
                'student_id' => 112,
                'status' => 1,
            ],
            // C-0117
            [
                'group_id' => 21,
                'student_id' => 113,
                'status' => 1,
            ],
            // C-0210
            [
                'group_id' => 22,
                'student_id' => 114,
                'status' => 1,
            ],
            [
                'group_id' => 22,
                'student_id' => 115,
                'status' => 1,
            ],
            [
                'group_id' => 22,
                'student_id' => 116,
                'status' => 1,
            ],
            [
                'group_id' => 22,
                'student_id' => 117,
                'status' => 1,
            ],
            [
                'group_id' => 22,
                'student_id' => 118,
                'status' => 1,
            ],
            [
                'group_id' => 22,
                'student_id' => 119,
                'status' => 1,
            ],
            [
                'group_id' => 22,
                'student_id' => 120,
                'status' => 1,
            ],
            // C-0306
            [
                'group_id' => 23,
                'student_id' => 121,
                'status' => 1,
            ],
            [
                'group_id' => 23,
                'student_id' => 122,
                'status' => 1,
            ],
            [
                'group_id' => 23,
                'student_id' => 123,
                'status' => 1,
            ],
            [
                'group_id' => 23,
                'student_id' => 124,
                'status' => 1,
            ],
            [
                'group_id' => 23,
                'student_id' => 125,
                'status' => 1,
            ],
            [
                'group_id' => 23,
                'student_id' => 126,
                'status' => 1,
            ],
            // C-0202
            [
                'group_id' => 24,
                'student_id' => 127,
                'status' => 1,
            ],
            [
                'group_id' => 24,
                'student_id' => 128,
                'status' => 1,
            ],
            [
                'group_id' => 24,
                'student_id' => 129,
                'status' => 1,
            ],
            [
                'group_id' => 24,
                'student_id' => 130,
                'status' => 1,
            ],
            [
                'group_id' => 24,
                'student_id' => 131,
                'status' => 1,
            ],
            [
                'group_id' => 24,
                'student_id' => 132,
                'status' => 1,
            ],
            [
                'group_id' => 24,
                'student_id' => 133,
                'status' => 1,
            ],
            [
                'group_id' => 24,
                'student_id' => 134,
                'status' => 1,
            ],
            // C-1005
            [
                'group_id' => 25,
                'student_id' => 135,
                'status' => 1,
            ],
            [
                'group_id' => 25,
                'student_id' => 136,
                'status' => 1,
            ],
            [
                'group_id' => 25,
                'student_id' => 137,
                'status' => 1,
            ],
            [
                'group_id' => 25,
                'student_id' => 138,
                'status' => 1,
            ],
            [
                'group_id' => 25,
                'student_id' => 139,
                'status' => 1,
            ],
            // C-0203
            [
                'group_id' => 26,
                'student_id' => 140,
                'status' => 1,
            ],
            [
                'group_id' => 26,
                'student_id' => 141,
                'status' => 1,
            ],
            [
                'group_id' => 26,
                'student_id' => 142,
                'status' => 1,
            ],
            [
                'group_id' => 26,
                'student_id' => 143,
                'status' => 1,
            ],
            [
                'group_id' => 26,
                'student_id' => 144,
                'status' => 1,
            ],
            [
                'group_id' => 26,
                'student_id' => 145,
                'status' => 1,
            ],
            [
                'group_id' => 26,
                'student_id' => 146,
                'status' => 1,
            ],
            [
                'group_id' => 26,
                'student_id' => 147,
                'status' => 1,
            ],
            // C-0507
            [
                'group_id' => 27,
                'student_id' => 148,
                'status' => 1,
            ],
            [
                'group_id' => 27,
                'student_id' => 149,
                'status' => 1,
            ],
            [
                'group_id' => 27,
                'student_id' => 150,
                'status' => 1,
            ],
            [
                'group_id' => 27,
                'student_id' => 151,
                'status' => 1,
            ],
            // C-0304.1
            [
                'group_id' => 28,
                'student_id' => 152,
                'status' => 1,
            ],
            [
                'group_id' => 28,
                'student_id' => 153,
                'status' => 1,
            ],
            [
                'group_id' => 28,
                'student_id' => 154,
                'status' => 1,
            ],
            [
                'group_id' => 28,
                'student_id' => 155,
                'status' => 1,
            ],
            [
                'group_id' => 28,
                'student_id' => 156,
                'status' => 1,
            ],
            [
                'group_id' => 28,
                'student_id' => 157,
                'status' => 1,
            ],
            [
                'group_id' => 28,
                'student_id' => 158,
                'status' => 1,
            ],
            [
                'group_id' => 28,
                'student_id' => 159,
                'status' => 1,
            ],
            [
                'group_id' => 28,
                'student_id' => 160,
                'status' => 1,
            ],
            [
                'group_id' => 28,
                'student_id' => 161,
                'status' => 1,
            ],
            // C-0402
            [
                'group_id' => 29,
                'student_id' => 162,
                'status' => 1,
            ],
            [
                'group_id' => 29,
                'student_id' => 163,
                'status' => 1,
            ],
            [
                'group_id' => 29,
                'student_id' => 164,
                'status' => 1,
            ],
            [
                'group_id' => 29,
                'student_id' => 165,
                'status' => 1,
            ],
            [
                'group_id' => 29,
                'student_id' => 166,
                'status' => 1,
            ],
            [
                'group_id' => 29,
                'student_id' => 167,
                'status' => 1,
            ],
            // C-0404
            [
                'group_id' => 30,
                'student_id' => 168,
                'status' => 1,
            ],
            [
                'group_id' => 30,
                'student_id' => 169,
                'status' => 1,
            ],
            [
                'group_id' => 30,
                'student_id' => 170,
                'status' => 1,
            ],
            [
                'group_id' => 30,
                'student_id' => 171,
                'status' => 1,
            ],
            [
                'group_id' => 30,
                'student_id' => 172,
                'status' => 1,
            ],
            // C-0503
            [
                'group_id' => 31,
                'student_id' => 173,
                'status' => 1,
            ],
            // C-1107
            [
                'group_id' => 33,
                'student_id' => 174,
                'status' => 1,
            ],
            [
                'group_id' => 33,
                'student_id' => 175,
                'status' => 1,
            ],
            [
                'group_id' => 33,
                'student_id' => 176,
                'status' => 1,
            ],
            [
                'group_id' => 33,
                'student_id' => 177,
                'status' => 1,
            ],
            [
                'group_id' => 33,
                'student_id' => 178,
                'status' => 1,
            ],
            // 0104
            [
                'group_id' => 36,
                'student_id' => 179,
                'status' => 1,
            ],
            [
                'group_id' => 36,
                'student_id' => 180,
                'status' => 1,
            ],
            // 0302
            [
                'group_id' => 37,
                'student_id' => 181,
                'status' => 1,
            ],
            // 0403
            [
                'group_id' => 39,
                'student_id' => 182,
                'status' => 1,
            ],
            [
                'group_id' => 39,
                'student_id' => 183,
                'status' => 1,
            ],
            [
                'group_id' => 39,
                'student_id' => 184,
                'status' => 1,
            ],
            [
                'group_id' => 39,
                'student_id' => 185,
                'status' => 1,
            ],
            [
                'group_id' => 39,
                'student_id' => 186,
                'status' => 1,
            ],
        ];
        foreach ($datas as $data){
            GroupStudent::create($data);
        }
    }
}
