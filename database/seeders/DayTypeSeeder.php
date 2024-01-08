<?php

namespace Database\Seeders;

use App\Models\Cource;
use App\Models\DayType;
use App\Models\Filial;
use App\Models\Group;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DayTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'name' => 'Har kuni',
                'days' => json_encode([1,2,3,4,5,6]),
            ],
            [
                'name' => 'Toq kunlari',
                'days' => json_encode([1,3,5]),
            ],
            [
                'name' => 'Juft kunlari',
                'days' => json_encode([2,4,6]),
            ],
            [
                'name' => 'Shanba-Yakashanba',
                'days' => json_encode([6,0]),
            ],
            [
                'name' => 'Seshanba'
            ],
        ];
        foreach ($data as $d){
            DayType::create($d);
        }
    }
}
