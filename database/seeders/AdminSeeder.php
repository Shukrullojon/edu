<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::create([
            'name' => 'Shukrullo',
            'surname' => 'Fatulloyev',
            'email' => 'shukrullo@gmail.com',
            'phone' => '993011798',
            'password' => Hash::make('993011798'),
            'filial_id' => 1,
        ]);
        $user->assignRole([Role::where('name','Admin')->first()->id]);
        $user->assignRole([Role::where('name','Teacher')->first()->id]);
    }
}
