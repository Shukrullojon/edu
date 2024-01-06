<?php

namespace Database\Seeders;

use App\Models\Comment;
use App\Models\Task;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 0; $i < 50; $i++){
            Comment::create([
                'model' => Task::class,
                'model_id' => Task::select('id')->inRandomOrder()->first()->id,
                'comment' => Str::random(20),
                'user_id' => User::select('id')->inRandomOrder()->first()->id,
            ]);
        }
    }
}
