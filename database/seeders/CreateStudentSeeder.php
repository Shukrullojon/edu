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
            'name' => 'Farangiz',
            'surname' => 'Mamatqulova',
            'email' => 'farangiz@gmail.com',
            'phone' => '996392866',
            'parent_phone' => '996392866',
            'password' => bcrypt('996392866'),
            'status' => 2,
        ]);
        $user->assignRole([$role->id]);
        $user->langs()->sync(Lang::select('id')->inRandomOrder()->first()->id);

        $user1 = User::create([
            'id_code' => '01240102',
            'name' => 'Quvonchbek',
            'surname' => 'Norboboyev',
            'email' => 'quvonchbek@gmail.com',
            'phone' => '946798680',
            'parent_phone' => '946798680',
            'password' => bcrypt('946798680'),
            'status' => 2,
        ]);
        $user1->assignRole([$role->id]);
        $user1->langs()->sync(Lang::select('id')->inRandomOrder()->first()->id);

        $user2 = User::create([
            'id_code' => '01240103',
            'name' => 'Sardor',
            'surname' => 'Qutbiddinov',
            'email' => 'sardor@gmail.com',
            'phone' => '887057530',
            'parent_phone' => '887057530',
            'password' => bcrypt('887057530'),
            'status' => 2,
        ]);
        $user2->assignRole([$role->id]);
        $user2->langs()->sync(Lang::select('id')->inRandomOrder()->first()->id);

        $user3 = User::create([
            'id_code' => '01240104',
            'name' => 'Munira',
            'surname' => 'Yusufboyeva',
            'email' => 'munira@gmail.com',
            'phone' => '933841029',
            'parent_phone' => '933841029',
            'password' => bcrypt('933841029'),
            'status' => 2,
        ]);
        $user3->assignRole([$role->id]);
        $user3->langs()->sync(Lang::select('id')->inRandomOrder()->first()->id);

        $user4 = User::create([
            'id_code' => '01240105',
            'name' => 'Asadbek',
            'surname' => 'Baratov',
            'email' => 'asadbek@gmail.com',
            'phone' => '997002322',
            'parent_phone' => '997002322',
            'password' => bcrypt('997002322'),
            'status' => 2,
        ]);
        $user4->assignRole([$role->id]);
        $user4->langs()->sync(Lang::select('id')->inRandomOrder()->first()->id);

        $user5 = User::create([
            'id_code' => '01240106',
            'name' => 'Adham',
            'surname' => 'Qoilov',
            'email' => 'adham@gmail.com',
            'phone' => '772837172',
            'parent_phone' => '772837172',
            'password' => bcrypt('772837172'),
            'status' => 2,
        ]);
        $user5->assignRole([$role->id]);
        $user5->langs()->sync(Lang::select('id')->inRandomOrder()->first()->id);

        $user6 = User::create([
            'id_code' => '01240107',
            'name' => 'Asad',
            'surname' => "Do'smuhammedov",
            'email' => 'asad@gmail.com',
            'phone' => '948111442',
            'parent_phone' => '948111442',
            'password' => bcrypt('948111442'),
            'status' => 2,
        ]);
        $user6->assignRole([$role->id]);
        $user6->langs()->sync(Lang::select('id')->inRandomOrder()->first()->id);

        $user7 = User::create([
            'id_code' => '01240108',
            'name' => 'Muhammad',
            'surname' => 'Bahtiyorov',
            'email' => 'muhammad@gmail.com',
            'phone' => '330401044',
            'parent_phone' => '330401044',
            'password' => bcrypt('330401044'),
            'status' => 2,
        ]);
        $user7->assignRole([$role->id]);
        $user7->langs()->sync(Lang::select('id')->inRandomOrder()->first()->id);

        $user8 = User::create([
            'id_code' => '01240109',
            'name' => 'Abubakir',
            'surname' => 'Salimov',
            'email' => 'abubakr@gmail.com',
            'phone' => '909472333',
            'parent_phone' => '909472333',
            'password' => bcrypt('909472333'),
            'status' => 2,
        ]);
        $user8->assignRole([$role->id]);
        $user8->langs()->sync(Lang::select('id')->inRandomOrder()->first()->id);

        $user9 = User::create([
            'id_code' => '01240110',
            'name' => 'Yahyo',
            'surname' => 'Bahtiyorov',
            'email' => 'yahyo@gmail.com',
            'phone' => '770944242',
            'parent_phone' => '770944242',
            'password' => bcrypt('770944242'),
            'status' => 2,
        ]);
        $user9->assignRole([$role->id]);
        $user9->langs()->sync(Lang::select('id')->inRandomOrder()->first()->id);

        $user10 = User::create([
            'id_code' => '01240111',
            'name' => 'Muslima',
            'surname' => 'Mirahmedova',
            'email' => 'muslima@gmail.com',
            'phone' => '880096949',
            'parent_phone' => '880096949',
            'password' => bcrypt('880096949'),
            'status' => 2,
        ]);
        $user10->assignRole([$role->id]);
        $user10->langs()->sync(Lang::select('id')->inRandomOrder()->first()->id);

        $user11 = User::create([
            'id_code' => '01240112',
            'name' => 'Aziz ',
            'surname' => "Yo'ldoshev",
            'email' => 'aziz@gmail.com',
            'phone' => '953800009',
            'parent_phone' => '953800009',
            'password' => bcrypt('953800009'),
            'status' => 2,
        ]);
        $user11->assignRole([$role->id]);
        $user11->langs()->sync(Lang::select('id')->inRandomOrder()->first()->id);

        $user12 = User::create([
            'id_code' => '01240111',
            'name' => 'Nurbek ',
            'surname' => "O'nganov",
            'email' => 'nurbek@gmail.com',
            'phone' => '971253232',
            'parent_phone' => '971253232',
            'password' => bcrypt('971253232'),
            'status' => 2,
        ]);
        $user12->assignRole([$role->id]);
        $user12->langs()->sync(Lang::select('id')->inRandomOrder()->first()->id);

        $user13 = User::create([
            'id_code' => '01240111',
            'name' => 'Komola ',
            'surname' => 'Mamurjonova',
            'email' => 'kamola@gmail.com',
            'phone' => '950004909',
            'parent_phone' => '950004909',
            'password' => bcrypt('950004909'),
            'status' => 2,
        ]);
        $user13->assignRole([$role->id]);
        $user13->langs()->sync(Lang::select('id')->inRandomOrder()->first()->id);

        $user14 = User::create([
            'id_code' => '01240111',
            'name' => 'Safia',
            'surname' => 'Baxtiyorova',
            'email' => 'safia@gmail.com',
            'phone' => '991562816',
            'parent_phone' => '991562816',
            'password' => bcrypt('991562816'),
            'status' => 2,
        ]);
        $user14->assignRole([$role->id]);
        $user14->langs()->sync(Lang::select('id')->inRandomOrder()->first()->id);

        $user15 = User::create([
            'id_code' => '01240111',
            'name' => 'Nigina',
            'surname' => 'Ergasheva',
            'email' => 'nigina@gmail.com',
            'phone' => '910116400',
            'parent_phone' => '910116400',
            'password' => bcrypt('910116400'),
            'status' => 2,
        ]);
        $user15->assignRole([$role->id]);
        $user15->langs()->sync(Lang::select('id')->inRandomOrder()->first()->id);
    }
}
