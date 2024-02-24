<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
            ['name' => 'position-show'],
            ['name' => 'position-index'],
            ['name' => 'position-create'],
            ['name' => 'position-store'],
            ['name' => 'position-edit'],
            ['name' => 'position-update'],
            ['name' => 'position-destroy'],

            ['name' => 'day-show'],
            ['name' => 'day-index'],
            ['name' => 'day-create'],
            ['name' => 'day-store'],
            ['name' => 'day-edit'],
            ['name' => 'day-update'],
            ['name' => 'day-destroy'],


            ['name' => 'finance-index'],
            ['name' => 'finance-report'],
            ['name' => 'finance-nopay'],
            ['name' => 'finance-later'],
            ['name' => 'finance-pay'],
            ['name' => 'finance-update'],

            ['name' => 'book-show'],
            ['name' => 'book-index'],
            ['name' => 'book-create'],
            ['name' => 'book-store'],
            ['name' => 'book-edit'],
            ['name' => 'book-update'],
            ['name' => 'book-destroy'],
            ['name' => 'book-give'],

            ['name' => 'direction-show'],
            ['name' => 'direction-index'],
            ['name' => 'direction-create'],
            ['name' => 'direction-store'],
            ['name' => 'direction-edit'],
            ['name' => 'direction-update'],
            ['name' => 'direction-destroy'],

            ['name' => 'lang-show'],
            ['name' => 'lang-index'],
            ['name' => 'lang-create'],
            ['name' => 'lang-store'],
            ['name' => 'lang-edit'],
            ['name' => 'lang-update'],
            ['name' => 'lang-destroy'],

            ['name' => 'filial-show'],
            ['name' => 'filial-index'],
            ['name' => 'filial-create'],
            ['name' => 'filial-store'],
            ['name' => 'filial-edit'],
            ['name' => 'filial-update'],
            ['name' => 'filial-destroy'],

            ['name' => 'permission-show'],
            ['name' => 'permission-index'],
            ['name' => 'permission-create'],
            ['name' => 'permission-store'],
            ['name' => 'permission-edit'],
            ['name' => 'permission-update'],
            ['name' => 'permission-destroy'],

            ['name' => 'role-show'],
            ['name' => 'role-index'],
            ['name' => 'role-create'],
            ['name' => 'role-store'],
            ['name' => 'role-edit'],
            ['name' => 'role-update'],
            ['name' => 'role-destroy'],

            ['name' => 'user-show'],
            ['name' => 'user-index'],
            ['name' => 'user-create'],
            ['name' => 'user-store'],
            ['name' => 'user-edit'],
            ['name' => 'user-update'],
            ['name' => 'user-destroy'],

            ['name' => 'task-show'],
            ['name' => 'task-index'],
            ['name' => 'task-create'],
            ['name' => 'task-store'],
            ['name' => 'task-edit'],
            ['name' => 'task-update'],
            ['name' => 'task-destroy'],

            ['name' => 'room-show'],
            ['name' => 'room-index'],
            ['name' => 'room-create'],
            ['name' => 'room-store'],
            ['name' => 'room-edit'],
            ['name' => 'room-update'],
            ['name' => 'room-destroy'],

            ['name' => 'room-task-show'],
            ['name' => 'room-task-index'],
            ['name' => 'room-task-create'],
            ['name' => 'room-task-store'],
            ['name' => 'room-task-edit'],
            ['name' => 'room-task-update'],
            ['name' => 'room-task-destroy'],

            ['name' => 'cource-show'],
            ['name' => 'cource-index'],
            ['name' => 'cource-create'],
            ['name' => 'cource-store'],
            ['name' => 'cource-edit'],
            ['name' => 'cource-update'],
            ['name' => 'cource-destroy'],

            ['name' => 'group-show'],
            ['name' => 'group-index'],
            ['name' => 'group-create'],
            ['name' => 'group-store'],
            ['name' => 'group-edit'],
            ['name' => 'group-update'],
            ['name' => 'group-destroy'],

            ['name' => 'student-add'],
            ['name' => 'student-payment'],
            ['name' => 'student-waiting'],
            ['name' => 'student-active'],
            ['name' => 'student-all'],
            ['name' => 'student-archive'],

            ['name' => 'student-event-show'],
            ['name' => 'student-event-index'],
            ['name' => 'student-event-create'],
            ['name' => 'student-event-store'],
            ['name' => 'student-event-edit'],
            ['name' => 'student-event-update'],
            ['name' => 'student-event-destroy'],

            ['name' => 'salary-active'],
            ['name' => 'salary-archive'],

            ['name' => 'placement-result-index'],

            ['name' => 'placement-category-show'],
            ['name' => 'placement-category-index'],
            ['name' => 'placement-category-create'],
            ['name' => 'placement-category-store'],
            ['name' => 'placement-category-edit'],
            ['name' => 'placement-category-update'],
            ['name' => 'placement-category-destroy'],

            ['name' => 'placement-test-show'],
            ['name' => 'placement-test-index'],
            ['name' => 'placement-test-create'],
            ['name' => 'placement-test-store'],
            ['name' => 'placement-test-edit'],
            ['name' => 'placement-test-update'],
            ['name' => 'placement-test-destroy'],

            ['name' => 'home-index'],
            ['name' => 'teacher-schedule'],
            ['name' => 'no-attend'],

            ['name' => 'user-profile'],
            ['name' => 'user-test'],
            ['name' => 'user-task'],
            ['name' => 'user-salary'],
        ];

        foreach ($permissionList as $item => $value){
            Permission::create($value);
        }
    }
}
