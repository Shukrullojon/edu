<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = Permission::pluck('id', 'id')->all();
        $admin = Role::create(['name' => 'Admin']);
        $admin->syncPermissions($permissions);

        $permissions_teacher = Permission::whereIn('name',[
            'attendance-index',
            'home-profile'
        ])->pluck('id', 'id')->all();
        $teacher = Role::create(['name' => 'Teacher']);
        $teacher->syncPermissions($permissions_teacher);

        $permissions_reception = Permission::whereIn('name',[
            'home-profile'
        ])->pluck('id', 'id')->all();
        $reception = Role::create(['name' => 'Reception']);
        $reception->syncPermissions($permissions_reception);

        $permissions_finance = Permission::whereIn('name',[
            'home-profile'
        ])->pluck('id', 'id')->all();
        $finance = Role::create(['name' => 'Finance']);
        $finance->syncPermissions($permissions_finance);

        $permissions_student = Permission::whereIn('name',[
            'home-profile'
        ])->pluck('id', 'id')->all();
        $student = Role::create(['name' => 'Student']);
        $student->syncPermissions($permissions_student);
    }
}
