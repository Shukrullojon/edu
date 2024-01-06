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
        for ($i = 1; $i < 10; $i ++){
            $user = User::create([
                'name' => 'Reception '.$i,
                'email' => "reception".$i."@gmail.com",
                'phone' => '91123456'.$i,
                'password' => bcrypt("reception".$i),
                'status' => rand(0,3),
            ]);
            $user->assignRole([$role->id]);
        }
    }
}
