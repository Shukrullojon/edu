<?php

namespace Database\Seeders;

use App\Models\Event;
use App\Models\EventUser;
use App\Models\User;
use App\Models\UserEvent;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserEventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 0; $i < 50; $i ++){
            EventUser::create([
                'user_id' => User::select('users.id as id')
                    ->join('model_has_roles', 'users.id', '=', 'model_has_roles.model_id')
                    ->join('roles', 'roles.id', '=', 'model_has_roles.role_id')
                    ->where('roles.name', 'Student')
                    ->where('model_has_roles.model_type', User::class)
                    ->inRandomOrder()
                    ->first()
                    ->id,
                'change_user_id' => User::select('users.id as id')
                    ->join('model_has_roles', 'users.id', '=', 'model_has_roles.model_id')
                    ->join('roles', 'roles.id', '=', 'model_has_roles.role_id')
                    ->where('roles.name', 'Reception')
                    ->where('model_has_roles.model_type', User::class)
                    ->inRandomOrder()
                    ->first()
                    ->id,
                'event_id' => Event::select('id')
                    ->inRandomOrder()
                    ->first()
                    ->id,
            ]);
        }
    }
}
