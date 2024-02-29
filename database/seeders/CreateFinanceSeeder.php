<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class CreateFinanceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::create([
            'name' => 'Suhrob',
            'surname' => 'Hasanov',
            'email' => 'suhrobhasanov@gmail.com',
            'phone' => '996589912',
            'password' => Hash::make('123456'),
            'status' => 1,
        ]);
        $role = Role::create(['name' => 'Finance']);
        $permissions = Permission::pluck('id', 'id')->all();
        $role->syncPermissions($permissions);
        $user->assignRole([$role->id]);
    }
}
