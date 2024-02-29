<?php

namespace Database\Seeders;

use App\Models\Direction;
use App\Models\DirectionUser;
use App\Models\Lang;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class CreateTeacherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role = Role::create(['name' => 'Teacher']);
        $permissions = Permission::pluck('id','id')->all();
        $role->syncPermissions($permissions);

        $user = User::create([
            'name' => 'Bobur',
            'surname' => 'Hamroyev',
            'email' => 'boburhamroyev@gmail.com',
            'phone' => '999892720',
            'password' => bcrypt('999892720'),
            'status' => 1,
        ]);
        $user->assignRole([$role->id]);
        $user->directions()->sync(Direction::select('id')->inRandomOrder()->first()->id);
        $user->langs()->sync(Lang::select('id')->inRandomOrder()->first()->id);


        $user2 = User::create([
            'name' => 'Xurshid',
            'surname' => 'Sodirov',
            'email' => 'xurshid@gmail.com',
            'phone' => '995555555',
            'password' => bcrypt('995555555'),
            'status' => 1,
        ]);
        $user2->assignRole([$role->id]);
        $user2->directions()->sync(Direction::select('id')->inRandomOrder()->first()->id);
        $user2->langs()->sync(Lang::select('id')->inRandomOrder()->first()->id);

        $user3 = User::create([
            'name' => "Jamshidxo'ja",
            'surname' => "Nasriddinov",
            'email' => 'jamshidxuja@gmail.com',
            'phone' => '977555551',
            'password' => bcrypt('977555551'),
            'status' => 1,
        ]);
        $user3->assignRole([$role->id]);
        $user3->directions()->sync(Direction::select('id')->inRandomOrder()->first()->id);
        $user3->langs()->sync(Lang::select('id')->inRandomOrder()->first()->id);
    }
}
