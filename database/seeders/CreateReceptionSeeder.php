<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class CreateReceptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role = Role::create(['name' => 'Reception']);
        $permissions = Permission::pluck('id','id')->all();
        $role->syncPermissions($permissions);
        $user = User::create([
            'name' => 'Nigina',
            'surname' => 'Hamroyeva',
            'email' => "niginahamroyeva@gmail.com",
            'phone' => "906552332",
            'password' => bcrypt("reception"),
            'status' => 1,
        ]);
        $user->assignRole([$role->id]);

        $user1 = User::create([
            'name' => 'Farangiz',
            'surname' => '',
            'email' => "farangizreception@gmail.com",
            'phone' => "936507888",
            'password' => bcrypt("reception2"),
            'status' => 1,
        ]);
        $user1->assignRole([$role->id]);
        //for ($i = 1; $i < 10; $i ++){

        //}
    }
}
