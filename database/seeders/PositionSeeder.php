<?php

namespace Database\Seeders;

use App\Models\Position;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PositionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $datas = [
            [
                'name' => 'Bugalter',
                'status' => 1,
            ],
            [
                'name' => 'Oqituvchi',
                'status' => 1,
            ],
            [
                'name' => 'Smm',
                'status' => 1,
            ],
            [
                'name' => 'Reception',
                'status' => 1,
            ],
        ];
        foreach ($datas as $data){
            Position::create($data);
        }
    }
}
