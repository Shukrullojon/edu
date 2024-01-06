<?php

namespace Database\Seeders;

use App\Models\PC;
use App\Models\PT;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class PTSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 0; $i < 200; $i ++){
            PT::create([
                'question' => Str::random(20),
                'a' => Str::random(10),
                'b' => Str::random(10),
                'c' => Str::random(10),
                'd' => Str::random(10),
                'answer' => rand(1,4),
                'p_c_id' => PC::select('id')->inRandomOrder()->first()->id
            ]);
        }
    }
}
