<?php

namespace Database\Seeders;

use App\Models\Direction;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DirectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'name' => 'Grammer',
            ],
            [
                'name' => 'Vocabulary',
            ],
            [
                'name' => 'Listening',
            ],
            [
                'name' => 'Speaking',
            ],
            [
                'name' => 'General',
            ],
            [
                'name' => 'Ielts',
            ],
        ];
        foreach ($data as $d){
            Direction::create($d);
        }
    }
}
