<?php

namespace Database\Seeders;

use App\Models\Group;
use App\Models\GroupStudent;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GroupStudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 0; $i < 50; $i ++){
            GroupStudent::firstOrCreate([
                'group_id' => Group::select('id')->inRandomOrder()->first()->id,
                'student_id' => User::select('id')->inRandomOrder()->first()->id,
                'status' => 1,
            ]);
        }
    }
}
