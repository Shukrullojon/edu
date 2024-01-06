<?php

namespace Database\Seeders;

use App\Models\DayType;
use App\Models\GroupDetail;
use App\Models\GroupTeacher;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(PermissionSeeder::class);
        $this->call(CreateAdminUserSeeder::class);
        $this->call(DirectionSeeder::class);
        $this->call(LangSeeder::class);
        $this->call(CreateStudentSeeder::class);
        $this->call(CreateTeacherSeeder::class);
        $this->call(CreateReceptionSeeder::class);
        $this->call(FilialSeeder::class);
        $this->call(RoomSeeder::class);
        $this->call(RoomTaskSeeder::class);
        $this->call(RoomTask_Seeder::class);
        $this->call(CourceSeeder::class);
        $this->call(DayTypeSeeder::class);
        $this->call(GroupSeeder::class);
        $this->call(GroupStudentSeeder::class);
        $this->call(GroupDetailsSeeder::class);
        $this->call(TaskSeeder::class);
        $this->call(CommentSeeder::class);
        $this->call(EventSeeder::class);
        $this->call(UserEventSeeder::class);
        $this->call(PCSeeder::class);
        $this->call(PTSeeder::class);
        $this->call(PUSeeder::class);
        $this->call(PURSeeder::class);
        $this->call(BookSeeder::class);
    }
}
