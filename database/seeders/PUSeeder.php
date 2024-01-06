<?php

namespace Database\Seeders;

use App\Models\PC;
use App\Models\PU;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PUSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 0; $i < 50; $i++) {
            PU::create([
                'user_id' => User::select('users.id as id')
                    ->join('model_has_roles', 'users.id', '=', 'model_has_roles.model_id')
                    ->join('roles', 'roles.id', '=', 'model_has_roles.role_id')
                    ->where('roles.name', 'Student')
                    ->where('model_has_roles.model_type', User::class)
                    ->inRandomOrder()
                    ->first()
                    ->id,
                'p_c_id' => PC::select('id')
                    ->where('status',1)
                    ->inRandomOrder()
                    ->first()
                    ->id,
                'attach_user_id' => User::select('users.id as id')
                    ->join('model_has_roles', 'users.id', '=', 'model_has_roles.model_id')
                    ->join('roles', 'roles.id', '=', 'model_has_roles.role_id')
                    ->where('roles.name', 'Reception')
                    ->where('model_has_roles.model_type', User::class)
                    ->inRandomOrder()
                    ->first()
                    ->id,
                'status' => rand(1,2),
            ]);
        }
    }
}
