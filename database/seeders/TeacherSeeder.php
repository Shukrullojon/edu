<?php

namespace Database\Seeders;

use App\Models\Direction;
use App\Models\Lang;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class TeacherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role = Role::where('name','Teacher')->first();

        $user1 = User::create([
            'name' => "Murod",
            'surname' => "Aliyev",
            'email' => 'murod@gmail.com',
            'phone' => '977717606',
            'password' => bcrypt('977717606'),
            'filial_id' => 1,
            'status' => 1,
        ]);
        $user1->assignRole([$role->id]);
        $user1->directions()->sync(Direction::select('id')->where('id',1)->first()->id);
        $user1->langs()->sync(Lang::select('id')->where('id',1)->first()->id);

        $user2 = User::create([
            'name' => "Farangiz",
            'surname' => "Rashidova",
            'email' => 'farangizdafaasdsda@gmail.com',
            'phone' => '991111111',
            'password' => bcrypt('991111111'),
            'filial_id' => 1,
            'status' => 1,
        ]);
        $user2->assignRole([$role->id]);
        $user2->directions()->sync(Direction::select('id')->where('id',1)->first()->id);
        $user2->langs()->sync(Lang::select('id')->where('id',1)->first()->id);

        $user3 = User::create([
            'name' => "Nafosat",
            'surname' => "Sheripova",
            'email' => 'nafosat5080@gmail.com',
            'phone' => '501077080',
            'password' => bcrypt('501077080'),
            'filial_id' => 1,
            'status' => 1,
        ]);
        $user3->assignRole([$role->id]);
        $user3->directions()->sync(Direction::select('id')->where('id',1)->first()->id);
        $user3->langs()->sync(Lang::select('id')->where('id',1)->first()->id);

        $user4 = User::create([
            'name' => "Visola",
            'surname' => "Palonchiyeva",
            'email' => 'visola@gmail.com',
            'phone' => '994260802',
            'password' => bcrypt('994260802'),
            'filial_id' => 1,
            'status' => 1,
        ]);
        $user4->assignRole([$role->id]);
        $user4->directions()->sync(Direction::select('id')->where('id',1)->first()->id);
        $user4->langs()->sync(Lang::select('id')->where('id',1)->first()->id);

        $user5 = User::create([
            'name' => "Barno",
            'surname' => "Nuriddinova",
            'email' => 'barno@gmail.com',
            'phone' => '955559151',
            'password' => bcrypt('955559151'),
            'filial_id' => 1,
            'status' => 1,
        ]);
        $user5->assignRole([$role->id]);
        $user5->directions()->sync(Direction::select('id')->where('id',1)->first()->id);
        $user5->langs()->sync(Lang::select('id')->where('id',1)->first()->id);

        $user6 = User::create([
            'name' => "Behruz",
            'surname' => "Mirzatillayev",
            'email' => 'bexruz@gmail.com',
            'phone' => '909788255',
            'password' => bcrypt('909788255'),
            'filial_id' => 1,
            'status' => 1,
        ]);
        $user6->assignRole([$role->id]);
        $user6->directions()->sync(Direction::select('id')->where('id',1)->first()->id);
        $user6->langs()->sync(Lang::select('id')->where('id',1)->first()->id);

        $user7 = User::create([
            'name' => "Inomjon",
            'surname' => "Kimdirov",
            'email' => 'inomjon@gmail.com',
            'phone' => '930020274',
            'password' => bcrypt('930020274'),
            'filial_id' => 1,
            'status' => 1,
        ]);
        $user7->assignRole([$role->id]);
        $user7->directions()->sync(Direction::select('id')->where('id',1)->first()->id);
        $user7->langs()->sync(Lang::select('id')->where('id',1)->first()->id);

        $user8 = User::create([
            'name' => "Mamnuna",
            'surname' => "Palonchiyeva",
            'email' => 'mamnuna@gmail.com',
            'phone' => '770003108',
            'password' => bcrypt('770003108'),
            'filial_id' => 1,
            'status' => 1,
        ]);
        $user8->assignRole([$role->id]);
        $user8->directions()->sync(Direction::select('id')->where('id',1)->first()->id);
        $user8->langs()->sync(Lang::select('id')->where('id',1)->first()->id);

        $user9 = User::create([
            'name' => "Rano",
            'surname' => "Qalesiva",
            'email' => 'rano@gmail.com',
            'phone' => '995585555',
            'password' => bcrypt('995585555'),
            'filial_id' => 1,
            'status' => 1,
        ]);
        $user9->assignRole([$role->id]);
        $user9->directions()->sync(Direction::select('id')->where('id',1)->first()->id);
        $user9->langs()->sync(Lang::select('id')->where('id',1)->first()->id);

        $user10 = User::create([
            'name' => "Nozima",
            'surname' => "Abduholiqova",
            'email' => 'nozima@gmail.com',
            'phone' => '335667482',
            'password' => bcrypt('335667482'),
            'filial_id' => 1,
            'status' => 1,
        ]);
        $user10->assignRole([$role->id]);
        $user10->directions()->sync(Direction::select('id')->where('id',1)->first()->id);
        $user10->langs()->sync(Lang::select('id')->where('id',1)->first()->id);

        $user11 = User::create([
            'name' => "Humoyun",
            'surname' => "Palonchiyev",
            'email' => 'humoyun@gmail.com',
            'phone' => '996346660',
            'password' => bcrypt('996346660'),
            'filial_id' => 1,
            'status' => 1,
        ]);
        $user11->assignRole([$role->id]);
        $user11->directions()->sync(Direction::select('id')->where('id',1)->first()->id);
        $user11->langs()->sync(Lang::select('id')->where('id',1)->first()->id);

        $user12 = User::create([
            'name' => "Marjona",
            'surname' => "Kimdirova",
            'email' => 'abc@gmail.com',
            'phone' => '888888888',
            'password' => bcrypt('888888888'),
            'filial_id' => 1,
            'status' => 1,
        ]);
        $user12->assignRole([$role->id]);
        $user12->directions()->sync(Direction::select('id')->where('id',1)->first()->id);
        $user12->langs()->sync(Lang::select('id')->where('id',1)->first()->id);

        $user13 = User::create([
            'name' => "Shahlo",
            'surname' => "Kimdirova",
            'email' => 'abc@gmail.com',
            'phone' => '777777777',
            'password' => bcrypt('777777777'),
            'filial_id' => 1,
            'status' => 1,
        ]);
        $user13->assignRole([$role->id]);
        $user13->directions()->sync(Direction::select('id')->where('id',1)->first()->id);
        $user13->langs()->sync(Lang::select('id')->where('id',1)->first()->id);

        $user14 = User::create([
            'name' => "Sobirjon",
            'surname' => "Kimdirova",
            'email' => 'abc@gmail.com',
            'phone' => '444444444',
            'password' => bcrypt('444444444'),
            'filial_id' => 1,
            'status' => 1,
        ]);
        $user14->assignRole([$role->id]);
        $user14->directions()->sync(Direction::select('id')->where('id',1)->first()->id);
        $user14->langs()->sync(Lang::select('id')->where('id',1)->first()->id);

        $user15 = User::create([
            'name' => "Shahnoza",
            'surname' => "Palonchiyeva",
            'email' => 'abc@gmail.com',
            'phone' => '885555555',
            'password' => bcrypt('885555555'),
            'filial_id' => 1,
            'status' => 1,
        ]);
        $user15->assignRole([$role->id]);
        $user15->directions()->sync(Direction::select('id')->where('id',1)->first()->id);
        $user15->langs()->sync(Lang::select('id')->where('id',1)->first()->id);
    }
}
