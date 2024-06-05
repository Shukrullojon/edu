<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissionList = [
            // home page
            ['name' => 'home-show'],
            ['name' => 'home-index'],
            ['name' => 'home-profile'],
            ['name' => 'home-filter'],
            // role page
            ['name' => 'role-index'],
            ['name' => 'role-filter'],
            ['name' => 'role-show'],
            ['name' => 'role-create'],
            ['name' => 'role-store'],
            ['name' => 'role-edit'],
            ['name' => 'role-update'],
            ['name' => 'role-destroy'],
            // user page
            ['name' => 'user-show'],
            ['name' => 'user-index'],
            ['name' => 'user-create'],
            ['name' => 'user-store'],
            ['name' => 'user-edit'],
            ['name' => 'user-update'],
            ['name' => 'user-destroy'],
            // filial page
            ['name' => 'filial-index'],
            ['name' => 'filial-filter'],
            ['name' => 'filial-show'],
            ['name' => 'filial-create'],
            ['name' => 'filial-store'],
            ['name' => 'filial-edit'],
            ['name' => 'filial-update'],
            ['name' => 'filial-destroy'],
            // room page
            ['name' => 'room-index'],
            ['name' => 'room-filter'],
            ['name' => 'room-show'],
            ['name' => 'room-create'],
            ['name' => 'room-store'],
            ['name' => 'room-edit'],
            ['name' => 'room-update'],
            ['name' => 'room-destroy'],
            // cource page
            ['name' => 'cource-index'],
            ['name' => 'cource-filter'],
            ['name' => 'cource-show'],
            ['name' => 'cource-create'],
            ['name' => 'cource-store'],
            ['name' => 'cource-edit'],
            ['name' => 'cource-update'],
            ['name' => 'cource-destroy'],
            // direction page
            ['name' => 'direction-index'],
            ['name' => 'direction-filter'],
            ['name' => 'direction-show'],
            ['name' => 'direction-create'],
            ['name' => 'direction-store'],
            ['name' => 'direction-edit'],
            ['name' => 'direction-update'],
            ['name' => 'direction-destroy'],
            // lang page
            ['name' => 'lang-index'],
            ['name' => 'lang-filter'],
            ['name' => 'lang-show'],
            ['name' => 'lang-create'],
            ['name' => 'lang-store'],
            ['name' => 'lang-edit'],
            ['name' => 'lang-update'],
            ['name' => 'lang-destroy'],
            // Day page
            ['name' => 'day-index'],
            ['name' => 'day-filter'],

            // Staff
            ['name' => 'staff-index'],
            ['name' => 'staff-filter'],
            ['name' => 'staff-show'],
            ['name' => 'staff-create'],
            ['name' => 'staff-store'],
            ['name' => 'staff-edit'],
            ['name' => 'staff-update'],
            ['name' => 'staff-destroy'],

            // Student
            ['name' => 'student-index'],
            ['name' => 'student-filter'],
            ['name' => 'student-show'],
            ['name' => 'student-create'],
            ['name' => 'student-store'],
            ['name' => 'student-edit'],
            ['name' => 'student-update'],
            ['name' => 'student-destroy'],

            // Group
            ['name' => 'group-index'],
            ['name' => 'group-filter'],
            ['name' => 'group-show'],
            ['name' => 'group-create'],
            ['name' => 'group-store'],
            ['name' => 'group-edit'],
            ['name' => 'group-update'],
            ['name' => 'group-destroy'],

            // Attendance
            ['name' => 'attendance-index'],
            ['name' => 'attendance-noattend'],
            ['name' => 'attendance-edit'],
            ['name' => 'attendance-update'],
            ['name' => 'attendance-filter'],

            // Schedule
            ['name' => 'schedule-index'],
        ];
        foreach ($permissionList as $item => $value){
            Permission::create($value);
        }
    }
}
