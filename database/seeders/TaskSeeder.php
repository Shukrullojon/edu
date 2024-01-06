<?php

namespace Database\Seeders;

use App\Models\Task;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 0; $i < 50; $i++) {
            Task::create([
               'name' => Str::random(10),
               'comment' => Str::random(20),
               'time' => rand(10,24).':00',
               'day' => rand(1,7),
               'type' => rand(1,2),
               'user_id' => User::select('id')->inRandomOrder()->first()->id,
               'attach_user_id' => User::select('id')->inRandomOrder()->first()->id,
               'status' => 1
            ]);
        }
    }
}
