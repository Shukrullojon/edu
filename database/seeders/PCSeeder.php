<?php

namespace Database\Seeders;

use App\Models\PC;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PCSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $pc = [
            [
                'name' => 'Beginner',
                'minute' => rand(20,60),
                'status' => 1,
            ],
            [
                'name' => 'Elementary',
                'minute' => rand(20,60),
                'status' => 1,
            ],
            [
                'name' => 'Per-Intermediate',
                'minute' => rand(20,60),
                'status' => 1,
            ],
            [
                'name' => 'Intermediate',
                'minute' => rand(20,60),
                'status' => 1,
            ],
            [
                'name' => 'Upper-Intermediate',
                'minute' => rand(20,60),
                'status' => 1,
            ],
            [
                'name' => 'Advanced',
                'minute' => rand(20,60),
                'status' => 1,
            ],
        ];
        foreach ($pc as $p){
            PC::create($p);
        }
    }
}
