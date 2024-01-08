<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class CreateAdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'Shukrullo',
            'surname' => 'Fatulloyev',
            'email' => 'admin@gmail.com',
            'phone' => '993011799',
            'password' => Hash::make('123456'),
            'status' => 1,
        ]);
        $role = Role::create(['name' => 'Admin']);
        $permissions = Permission::pluck('id', 'id')->all();
        $role->syncPermissions($permissions);
        $user->assignRole([$role->id]);

        $user1 = User::create([
            'name' => "Jamshidxo'ja",
            'surname' => 'Nasriddinov',
            'email' => 'cityeducation@gmail.com',
            'phone' => '977555551',
            'password' => Hash::make('977555551'),
            'status' => 1,
        ]);
        $role1 = Role::create(['name' => 'Admin']);
        $permissions1 = Permission::pluck('id', 'id')->all();
        $role1->syncPermissions($permissions1);
        $user1->assignRole([$role1->id]);

    }
}
