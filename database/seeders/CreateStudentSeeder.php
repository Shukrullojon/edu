<?php

namespace Database\Seeders;

use App\Models\Lang;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class CreateStudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role = Role::create(['name' => 'Student']);
        $permissions = Permission::pluck('id','id')->all();
        $role->syncPermissions($permissions);

        $user = User::create([
            'id_code' => '01240101',
            'name' => 'STUDENT 1',
            'email' => 'student1@gmail.com',
            'phone' => '991234567',
            'parent_phone' => '991234567',
            'password' => bcrypt('student1'),
            'status' => rand(0,3),
        ]);
        $user->assignRole([$role->id]);
        $user->langs()->sync(Lang::select('id')->inRandomOrder()->first()->id);

        $user1 = User::create([
            'id_code' => '01240102',
            'name' => 'STUDENT 2',
            'email' => 'student2@gmail.com',
            'phone' => '991234568',
            'parent_phone' => '991234568',
            'password' => bcrypt('student2'),
            'status' => rand(0,3),
        ]);
        $user1->assignRole([$role->id]);
        $user1->langs()->sync(Lang::select('id')->inRandomOrder()->first()->id);

        $user2 = User::create([
            'id_code' => '01240103',
            'name' => 'STUDENT 3',
            'email' => 'student3@gmail.com',
            'phone' => '991234569',
            'parent_phone' => '991234569',
            'password' => bcrypt('student3'),
            'status' => rand(0,3),
        ]);
        $user2->assignRole([$role->id]);
        $user2->langs()->sync(Lang::select('id')->inRandomOrder()->first()->id);

        $user3 = User::create([
            'id_code' => '01240104',
            'name' => 'STUDENT 4',
            'email' => 'student4@gmail.com',
            'phone' => '991234570',
            'parent_phone' => '991234570',
            'password' => bcrypt('student4'),
            'status' => rand(0,3),
        ]);
        $user3->assignRole([$role->id]);
        $user3->langs()->sync(Lang::select('id')->inRandomOrder()->first()->id);

        $user4 = User::create([
            'id_code' => '01240105',
            'name' => 'STUDENT 5',
            'email' => 'student5@gmail.com',
            'phone' => '993011798',
            'parent_phone' => '993011798',
            'password' => bcrypt('student5'),
            'status' => rand(0,3),
        ]);
        $user4->assignRole([$role->id]);
        $user4->langs()->sync(Lang::select('id')->inRandomOrder()->first()->id);

        $user5 = User::create([
            'id_code' => '01240106',
            'name' => 'STUDENT',
            'surname' => 'STD',
            'email' => 'student6@gmail.com',
            'phone' => '935318000',
            'parent_phone' => '935318000',
            'password' => bcrypt('student6'),
            'status' => rand(0,3),
        ]);
        $user5->assignRole([$role->id]);
        $user5->langs()->sync(Lang::select('id')->inRandomOrder()->first()->id);

        $user6 = User::create([
            'id_code' => '01240107',
            'name' => 'STUDENT 7',
            'email' => 'student7@gmail.com',
            'phone' => '991234573',
            'parent_phone' => '991234573',
            'password' => bcrypt('student7'),
            'status' => rand(0,3),
        ]);
        $user6->assignRole([$role->id]);
        $user6->langs()->sync(Lang::select('id')->inRandomOrder()->first()->id);

        $user7 = User::create([
            'id_code' => '01240108',
            'name' => 'STUDENT 8',
            'email' => 'student8@gmail.com',
            'phone' => '991234574',
            'parent_phone' => '991234574',
            'password' => bcrypt('student8'),
            'status' => rand(0,3),
        ]);
        $user7->assignRole([$role->id]);
        $user7->langs()->sync(Lang::select('id')->inRandomOrder()->first()->id);

        $user8 = User::create([
            'id_code' => '01240109',
            'name' => 'STUDENT 9',
            'email' => 'student9@gmail.com',
            'phone' => '991234575',
            'parent_phone' => '991234575',
            'password' => bcrypt('student9'),
            'status' => rand(0,3),
        ]);
        $user8->assignRole([$role->id]);
        $user8->langs()->sync(Lang::select('id')->inRandomOrder()->first()->id);

        $user9 = User::create([
            'id_code' => '01240110',
            'name' => 'STUDENT 10',
            'email' => 'student10@gmail.com',
            'phone' => '991234576',
            'parent_phone' => '991234576',
            'password' => bcrypt('student10'),
            'status' => rand(0,3),
        ]);
        $user9->assignRole([$role->id]);
        $user9->langs()->sync(Lang::select('id')->inRandomOrder()->first()->id);

        $user10 = User::create([
            'id_code' => '01240111',
            'name' => 'STUDENT 11',
            'email' => 'student11@gmail.com',
            'phone' => '991234579',
            'parent_phone' => '991234579',
            'password' => bcrypt('student11'),
            'status' => rand(0,3),
        ]);
        $user10->assignRole([$role->id]);
        $user10->langs()->sync(Lang::select('id')->inRandomOrder()->first()->id);
    }
}
