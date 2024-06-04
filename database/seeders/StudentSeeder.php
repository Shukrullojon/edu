<?php

namespace Database\Seeders;

use App\Models\Cource;
use App\Models\Day;
use App\Models\Lang;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role = Role::where(['name' => 'Student'])->first();
        $status_list = [1, 2, 3, 4, 5, 6, 21];

        $user = User::create([
            'id' => 17,
            'name' => 'Azada',
            'surname' => 'Karliboyeva',
            'email' => 'azada@gmail.com',
            'phone' => '913761554',
            'password' => bcrypt('913761554'),
            'status' => 4,
        ]);
        $user->assignRole([$role->id]);
        $user->langs()->sync(Lang::select('id')->where('id',1)->inRandomOrder()->first()->id);

        $user = User::create([
            'id' => 18,
            'name' => 'Shohruh',
            'surname' => 'Husanov',
            'email' => 'shohruh@gmail.com',
            'phone' => '931176607',
            'password' => bcrypt('931176607'),
            'status' => 4,
        ]);
        $user->assignRole([$role->id]);
        $user->langs()->sync(Lang::select('id')->inRandomOrder()->first()->id);

        $user = User::create([
            'id' => 19,
            'name' => 'Alibek',
            'surname' => 'Soliyev',
            'email' => 'alibek@gmail.com',
            'phone' => '910091818',
            'password' => bcrypt('910091818'),
            'status' => 4,
        ]);
        $user->assignRole([$role->id]);
        $user->langs()->sync(Lang::select('id')->inRandomOrder()->first()->id);
        // C-1101
        $user = User::create([
            'id' => 20,
            'name' => 'Alfruza',
            'surname' => 'Nasriddinova',
            'email' => 'afruza@gmail.com',
            'phone' => '911662604',
            'password' => bcrypt('911662604'),
            'status' => 4,
        ]);
        $user->assignRole([$role->id]);
        $user->langs()->sync(Lang::select('id')->inRandomOrder()->first()->id);

        $user = User::create([
            'id' => 21,
            'name' => 'Diyorbek',
            'surname' => 'Ergashev',
            'email' => 'diyorbek@gmail.com',
            'phone' => '919547074',
            'password' => bcrypt('919547074'),
            'status' => 4,
        ]);
        $user->assignRole([$role->id]);
        $user->langs()->sync(Lang::select('id')->inRandomOrder()->first()->id);

        $user = User::create([
            'id' => 22,
            'name' => 'Jahongir',
            'surname' => 'Mirzayev',
            'email' => 'jahongir@gmail.com',
            'phone' => '940123747',
            'password' => bcrypt('940123747'),
            'status' => 4,
        ]);
        $user->assignRole([$role->id]);
        $user->langs()->sync(Lang::select('id')->inRandomOrder()->first()->id);

        $user = User::create([
            'id' => 23,
            'name' => 'Mamura',
            'surname' => 'Qurbonaliyeva',
            'email' => 'mamura@gmail.com',
            'phone' => '950490797',
            'password' => bcrypt('950490797'),
            'status' => 4,
        ]);
        $user->assignRole([$role->id]);
        $user->langs()->sync(Lang::select('id')->inRandomOrder()->first()->id);

        // c-0201
        $user = User::create([
            'id' => 24,
            'name' => 'Sevinch',
            'surname' => 'Kimdirova',
            'email' => 'sevinch@gmail.com',
            'phone' => '934750264',
            'password' => bcrypt('934750264'),
            'status' => 4,
        ]);
        $user->assignRole([$role->id]);
        $user->langs()->sync(Lang::select('id')->inRandomOrder()->first()->id);

        $user = User::create([
            'id' => 25,
            'name' => 'Samandar',
            'surname' => 'Subhonov',
            'email' => 'samandar@gmail.com',
            'phone' => '943309206',
            'password' => bcrypt('943309206'),
            'status' => 4,
        ]);
        $user->assignRole([$role->id]);
        $user->langs()->sync(Lang::select('id')->inRandomOrder()->first()->id);

        // c-0101
        $user = User::create([
            'id' => 26,
            'name' => 'Shonazar',
            'surname' => 'Mahmudov',
            'email' => 'shonazar@gmail.com',
            'phone' => '977444959',
            'password' => bcrypt('977444959'),
            'status' => 4,
        ]);
        $user->assignRole([$role->id]);
        $user->langs()->sync(Lang::select('id')->inRandomOrder()->first()->id);

        $user = User::create([
            'id' => 27,
            'name' => 'Bahodir',
            'surname' => 'Jamolov',
            'email' => 'bahodir@gmail.com',
            'phone' => '903426769',
            'password' => bcrypt('903426769'),
            'status' => 4,
        ]);
        $user->assignRole([$role->id]);
        $user->langs()->sync(Lang::select('id')->inRandomOrder()->first()->id);

        // C-0602
        $user = User::create([
            'id' => 28,
            'name' => 'Sevinch',
            'surname' => 'Sohibova',
            'email' => 'sevinch@gmail.com',
            'phone' => '971336373',
            'password' => bcrypt('971336373'),
            'status' => 4,
        ]);
        $user->assignRole([$role->id]);
        $user->langs()->sync(Lang::select('id')->inRandomOrder()->first()->id);

        $user = User::create([
            'id' => 29,
            'name' => 'Kamron',
            'surname' => 'Hasanov',
            'email' => 'kamron@gmail.com',
            'phone' => '903922908',
            'password' => bcrypt('903922908'),
            'status' => 4,
        ]);
        $user->assignRole([$role->id]);
        $user->langs()->sync(Lang::select('id')->inRandomOrder()->first()->id);

        $user = User::create([
            'id' => 30,
            'name' => 'Rayhona',
            'surname' => 'Ibrahimova',
            'email' => 'rayhona@gmail.com',
            'phone' => '998655044',
            'password' => bcrypt('998655044'),
            'status' => 4,
        ]);
        $user->assignRole([$role->id]);
        $user->langs()->sync(Lang::select('id')->inRandomOrder()->first()->id);

        // C-1002
        $user = User::create([
            'id' => 31,
            'name' => 'Diyorbek',
            'surname' => 'Sayfulayev',
            'email' => 'diyorbek@gmail.com',
            'phone' => '999672082',
            'password' => bcrypt('999672082'),
            'status' => 4,
        ]);
        $user->assignRole([$role->id]);
        $user->langs()->sync(Lang::select('id')->inRandomOrder()->first()->id);

        $user = User::create([
            'id' => 32,
            'name' => 'Yusuf',
            'surname' => 'Qobulov',
            'email' => 'yusuf@gmail.com',
            'phone' => '900238685',
            'password' => bcrypt('900238685'),
            'status' => 4,
        ]);
        $user->assignRole([$role->id]);
        $user->langs()->sync(Lang::select('id')->inRandomOrder()->first()->id);

        $user = User::create([
            'id' => 33,
            'name' => 'Fahriddinova',
            'surname' => 'Laziza',
            'email' => 'fahriddinova@gmail.com',
            'phone' => '977753933',
            'password' => bcrypt('977753933'),
            'status' => 4,
        ]);
        $user->assignRole([$role->id]);
        $user->langs()->sync(Lang::select('id')->inRandomOrder()->first()->id);

        // C-0102
        $user = User::create([
            'id' => 34,
            'name' => 'Doniyor',
            'surname' => 'Muhammadov',
            'email' => 'doniyor@gmail.com',
            'phone' => '951183010',
            'password' => bcrypt('951183010'),
            'status' => 4,
        ]);
        $user->assignRole([$role->id]);
        $user->langs()->sync(Lang::select('id')->inRandomOrder()->first()->id);

        $user = User::create([
            'id' => 35,
            'name' => 'Abror',
            'surname' => 'Sodirov',
            'email' => 'abror@gmail.com',
            'phone' => '994321426',
            'password' => bcrypt('994321426'),
            'status' => 4,
        ]);
        $user->assignRole([$role->id]);
        $user->langs()->sync(Lang::select('id')->inRandomOrder()->first()->id);

        $user = User::create([
            'id' => 36,
            'name' => 'Kamron',
            'surname' => 'Hasanov',
            'email' => 'kamron@gmail.com',
            'phone' => '903922908',
            'password' => bcrypt('903922908'),
            'status' => 4,
        ]);
        $user->assignRole([$role->id]);
        $user->langs()->sync(Lang::select('id')->inRandomOrder()->first()->id);

        $user = User::create([
            'id' => 37,
            'name' => 'Abror',
            'surname' => 'Hamidov',
            'email' => 'abror@gmail.com',
            'phone' => '980102267',
            'password' => bcrypt('980102267'),
            'status' => 4,
        ]);
        $user->assignRole([$role->id]);
        $user->langs()->sync(Lang::select('id')->inRandomOrder()->first()->id);

        $user = User::create([
            'id' => 38,
            'name' => 'Ezozhon',
            'surname' => 'Saidahmedov',
            'email' => 'ezozhon@gmail.com',
            'phone' => '998505710',
            'password' => bcrypt('998505710'),
            'status' => 4,
        ]);
        $user->assignRole([$role->id]);
        $user->langs()->sync(Lang::select('id')->inRandomOrder()->first()->id);

        $user = User::create([
            'id' => 39,
            'name' => 'Behruz',
            'surname' => 'Fayzullayev',
            'email' => 'behruz@gmail.com',
            'phone' => '937395313',
            'password' => bcrypt('937395313'),
            'status' => 4,
        ]);
        $user->assignRole([$role->id]);
        $user->langs()->sync(Lang::select('id')->inRandomOrder()->first()->id);

        $user = User::create([
            'id' => 40,
            'name' => 'Kozimjon',
            'surname' => 'Latipov',
            'email' => 'kozimjon@gmail.com',
            'phone' => '970024942',
            'password' => bcrypt('970024942'),
            'status' => 4,
        ]);
        $user->assignRole([$role->id]);
        $user->langs()->sync(Lang::select('id')->inRandomOrder()->first()->id);

        $user = User::create([
            'id' => 41,
            'name' => 'Shirin',
            'surname' => 'Abduganiyeva',
            'email' => 'shirin@gmail.com',
            'phone' => '919644842',
            'password' => bcrypt('919644842'),
            'status' => 4,
        ]);
        $user->assignRole([$role->id]);
        $user->langs()->sync(Lang::select('id')->inRandomOrder()->first()->id);

        $user = User::create([
            'id' => 42,
            'name' => 'Madina',
            'surname' => 'Dilmurodova',
            'email' => 'madina@gmail.com',
            'phone' => '977725818',
            'password' => bcrypt('9777258180'),
            'status' => 4,
        ]);
        $user->assignRole([$role->id]);
        $user->langs()->sync(Lang::select('id')->inRandomOrder()->first()->id);

        $user = User::create([
            'id' => 43,
            'name' => 'Mohirabonu',
            'surname' => 'Saidahmeddova',
            'email' => 'mohirabonu@gmail.com',
            'phone' => '992700047',
            'password' => bcrypt('992700047'),
            'status' => 4,
        ]);
        $user->assignRole([$role->id]);
        $user->langs()->sync(Lang::select('id')->inRandomOrder()->first()->id);

        $user = User::create([
            'id' => 44,
            'name' => 'Muslimbek',
            'surname' => 'Dedahonov',
            'email' => 'muslimbek@gmail.com',
            'phone' => '930016113',
            'password' => bcrypt('930016113'),
            'status' => 4,
        ]);
        $user->assignRole([$role->id]);
        $user->langs()->sync(Lang::select('id')->inRandomOrder()->first()->id);

        $user = User::create([
            'id' => 45,
            'name' => 'Zebiniso',
            'surname' => 'Holboyeva',
            'email' => 'zebiniso@gmail.com',
            'phone' => '991017183',
            'password' => bcrypt('991017183'),
            'status' => 4,
        ]);
        $user->assignRole([$role->id]);
        $user->langs()->sync(Lang::select('id')->inRandomOrder()->first()->id);

        $user = User::create([
            'id' => 46,
            'name' => 'Rustam',
            'surname' => 'Turobov',
            'email' => 'rustam@gmail.com',
            'phone' => '900260141',
            'password' => bcrypt('900260141'),
            'status' => 4,
        ]);
        $user->assignRole([$role->id]);
        $user->langs()->sync(Lang::select('id')->inRandomOrder()->first()->id);

        $user = User::create([
            'id' => 47,
            'name' => 'Sherzod',
            'surname' => 'Abdullayev',
            'email' => 'sherzod@gmail.com',
            'phone' => '946726026',
            'password' => bcrypt('946726026'),
            'status' => 4,
        ]);
        $user->assignRole([$role->id]);
        $user->langs()->sync(Lang::select('id')->inRandomOrder()->first()->id);

        $user = User::create([
            'id' => 48,
            'name' => 'Komila',
            'surname' => 'Saidazimova',
            'email' => 'komila@gmail.com',
            'phone' => '900002977',
            'password' => bcrypt('900002977'),
            'status' => 4,
        ]);
        $user->assignRole([$role->id]);
        $user->langs()->sync(Lang::select('id')->inRandomOrder()->first()->id);

        $user = User::create([
            'id' => 49,
            'name' => 'Muhsina',
            'surname' => 'Asomaliyeva',
            'email' => 'muhsina@gmail.com',
            'phone' => '977770206',
            'password' => bcrypt('977770206'),
            'status' => 4,
        ]);
        $user->assignRole([$role->id]);
        $user->langs()->sync(Lang::select('id')->inRandomOrder()->first()->id);

        $user = User::create([
            'id' => 50,
            'name' => 'Lola',
            'surname' => 'Rihsiboyeva',
            'email' => 'lola@gmail.com',
            'phone' => '946100324',
            'password' => bcrypt('946100324'),
            'status' => 4,
        ]);
        $user->assignRole([$role->id]);
        $user->langs()->sync(Lang::select('id')->inRandomOrder()->first()->id);

        // C-1102
        $user = User::create([
            'id' => 51,
            'name' => 'Zarina',
            'surname' => 'Tajikulova',
            'email' => 'zarina@gmail.com',
            'phone' => '937163109',
            'password' => bcrypt('937163109'),
            'status' => 4,
        ]);
        $user->assignRole([$role->id]);
        $user->langs()->sync(Lang::select('id')->inRandomOrder()->first()->id);

        $user = User::create([
            'id' => 52,
            'name' => 'Fazilat',
            'surname' => 'Jumanboyeva',
            'email' => 'fazilat@gmail.com',
            'phone' => '970140015',
            'password' => bcrypt('970140015'),
            'status' => 4,
        ]);
        $user->assignRole([$role->id]);
        $user->langs()->sync(Lang::select('id')->inRandomOrder()->first()->id);

        $user = User::create([
            'id' => 53,
            'name' => 'Durdona',
            'surname' => "Turg'unbiyeva",
            'email' => 'durdona@gmail.com',
            'phone' => '999253418',
            'password' => bcrypt('999253418'),
            'status' => 4,
        ]);
        $user->assignRole([$role->id]);
        $user->langs()->sync(Lang::select('id')->inRandomOrder()->first()->id);

        $user = User::create([
            'id' => 54,
            'name' => 'Munira',
            'surname' => "Mirzaakbarova",
            'email' => 'munira@gmail.com',
            'phone' => '910129313',
            'password' => bcrypt('910129313'),
            'status' => 4,
        ]);
        $user->assignRole([$role->id]);
        $user->langs()->sync(Lang::select('id')->inRandomOrder()->first()->id);

        $user = User::create([
            'id' => 55,
            'name' => 'Sarvara',
            'surname' => "Sodiqova",
            'email' => 'sarvara@gmail.com',
            'phone' => '931837711',
            'password' => bcrypt('931837711'),
            'status' => 4,
        ]);
        $user->assignRole([$role->id]);
        $user->langs()->sync(Lang::select('id')->inRandomOrder()->first()->id);

        $user = User::create([
            'id' => 56,
            'name' => 'Maftuna',
            'surname' => "Yusupboyeva",
            'email' => 'maftuna@gmail.com',
            'phone' => '946572912',
            'password' => bcrypt('946572912'),
            'status' => 4,
        ]);
        $user->assignRole([$role->id]);
        $user->langs()->sync(Lang::select('id')->inRandomOrder()->first()->id);

        $user = User::create([
            'id' => 57,
            'name' => 'Farangiz',
            'surname' => "Komoliddinova",
            'email' => 'farangiz@gmail.com',
            'phone' => '991229164',
            'password' => bcrypt('991229164'),
            'status' => 4,
        ]);
        $user->assignRole([$role->id]);
        $user->langs()->sync(Lang::select('id')->inRandomOrder()->first()->id);

        $user = User::create([
            'id' => 58,
            'name' => 'Muhamadaliyeva',
            'surname' => "Hadicha",
            'email' => 'hadicha@gmail.com',
            'phone' => '900532425',
            'password' => bcrypt('900532425'),
            'status' => 4,
        ]);
        $user->assignRole([$role->id]);
        $user->langs()->sync(Lang::select('id')->inRandomOrder()->first()->id);

        //C-1003
        $user = User::create([
            'id' => 59,
            'name' => 'Munira',
            'surname' => "Yusufboyeva",
            'email' => 'munira@gmail.com',
            'phone' => '933841029',
            'password' => bcrypt('933841029'),
            'status' => 4,
        ]);
        $user->assignRole([$role->id]);
        $user->langs()->sync(Lang::select('id')->inRandomOrder()->first()->id);

        $user = User::create([
            'id' => 60,
            'name' => 'Sardor',
            'surname' => "Yusufboyeva",
            'email' => 'sardor@gmail.com',
            'phone' => '887057530',
            'password' => bcrypt('887057530'),
            'status' => 4,
        ]);
        $user->assignRole([$role->id]);
        $user->langs()->sync(Lang::select('id')->inRandomOrder()->first()->id);

        $user = User::create([
            'id' => 61,
            'name' => 'Quvonchbek',
            'surname' => "Norboboyev",
            'email' => 'quvonchbek@gmail.com',
            'phone' => '946798680',
            'password' => bcrypt('946798680'),
            'status' => 4,
        ]);
        $user->assignRole([$role->id]);
        $user->langs()->sync(Lang::select('id')->inRandomOrder()->first()->id);

        $user = User::create([
            'id' => 62,
            'name' => 'Farangiz',
            'surname' => "Mamatqulova",
            'email' => 'farangiz@gmail.com',
            'phone' => '996392866',
            'password' => bcrypt('996392866'),
            'status' => 4,
        ]);
        $user->assignRole([$role->id]);
        $user->langs()->sync(Lang::select('id')->inRandomOrder()->first()->id);

        $user = User::create([
            'id' => 63,
            'name' => 'Shahzoda',
            'surname' => "Alimova",
            'email' => 'shahzoda@gmail.com',
            'phone' => '990900359',
            'password' => bcrypt('990900359'),
            'status' => 4,
        ]);
        $user->assignRole([$role->id]);
        $user->langs()->sync(Lang::select('id')->inRandomOrder()->first()->id);

        $user = User::create([
            'id' => 64,
            'name' => 'Mirzohid',
            'surname' => "Musunjonov",
            'email' => 'mirzohid@gmail.com',
            'phone' => '934047976',
            'password' => bcrypt('934047976'),
            'status' => 4,
        ]);
        $user->assignRole([$role->id]);
        $user->langs()->sync(Lang::select('id')->inRandomOrder()->first()->id);
        // C-0905
        $user = User::create([
            'id' => 65,
            'name' => 'Munisa',
            'surname' => "Mirrahimova",
            'email' => 'munisa@gmail.com',
            'phone' => '880096949',
            'password' => bcrypt('880096949'),
            'status' => 4,
        ]);
        $user->assignRole([$role->id]);
        $user->langs()->sync(Lang::select('id')->inRandomOrder()->first()->id);

        $user = User::create([
            'id' => 66,
            'name' => 'Bahodir',
            'surname' => "Abdujalolov",
            'email' => 'bahodir@gmail.com',
            'phone' => '332828802',
            'password' => bcrypt('332828802'),
            'status' => 4,
        ]);
        $user->assignRole([$role->id]);
        $user->langs()->sync(Lang::select('id')->inRandomOrder()->first()->id);

        $user = User::create([
            'id' => 67,
            'name' => 'Muslima',
            'surname' => "Shokirova",
            'email' => 'muslima@gmail.com',
            'phone' => '880092612',
            'password' => bcrypt('880092612'),
            'status' => 4,
        ]);
        $user->assignRole([$role->id]);
        $user->langs()->sync(Lang::select('id')->inRandomOrder()->first()->id);

        $user = User::create([
            'id' => 68,
            'name' => 'Murod',
            'surname' => "Samig'jonov",
            'email' => 'murod@gmail.com',
            'phone' => '935525982',
            'password' => bcrypt('935525982'),
            'status' => 4,
        ]);
        $user->assignRole([$role->id]);
        $user->langs()->sync(Lang::select('id')->inRandomOrder()->first()->id);

        $user = User::create([
            'id' => 69,
            'name' => 'Shohida',
            'surname' => "Bahtiyorova",
            'email' => 'shohida@gmail.com',
            'phone' => '948948018',
            'password' => bcrypt('948948018'),
            'status' => 4,
        ]);
        $user->assignRole([$role->id]);
        $user->langs()->sync(Lang::select('id')->inRandomOrder()->first()->id);

        $user = User::create([
            'id' => 70,
            'name' => 'Shavkat',
            'surname' => "Bahtiyorov",
            'email' => 'shavkat@gmail.com',
            'phone' => '971712502',
            'password' => bcrypt('971712502'),
            'status' => 4,
        ]);
        $user->assignRole([$role->id]);
        $user->langs()->sync(Lang::select('id')->inRandomOrder()->first()->id);

        $user = User::create([
            'id' => 71,
            'name' => 'Shahlo',
            'surname' => "O'rinboyeva",
            'email' => 'shahlo@gmail.com',
            'phone' => '949477810',
            'password' => bcrypt('949477810'),
            'status' => 4,
        ]);
        $user->assignRole([$role->id]);
        $user->langs()->sync(Lang::select('id')->inRandomOrder()->first()->id);
        // C-0205
        $user = User::create([
            'id' => 72,
            'name' => 'Ziyovuddin',
            'surname' => "Muhammadjonov",
            'email' => 'ziyovuddin@gmail.com',
            'phone' => '900378747',
            'password' => bcrypt('900378747'),
            'status' => 4,
        ]);
        $user->assignRole([$role->id]);
        $user->langs()->sync(Lang::select('id')->inRandomOrder()->first()->id);

        $user = User::create([
            'id' => 73,
            'name' => 'Ibrohim',
            'surname' => "Shuhratullayev",
            'email' => 'ibrohim@gmail.com',
            'phone' => '935068440',
            'password' => bcrypt('935068440'),
            'status' => 4,
        ]);
        $user->assignRole([$role->id]);
        $user->langs()->sync(Lang::select('id')->inRandomOrder()->first()->id);

        $user = User::create([
            'id' => 74,
            'name' => 'Farhod',
            'surname' => "Usmonov",
            'email' => 'farhod@gmail.com',
            'phone' => '909793030',
            'password' => bcrypt('909793030'),
            'status' => 4,
        ]);
        $user->assignRole([$role->id]);
        $user->langs()->sync(Lang::select('id')->inRandomOrder()->first()->id);

        $user = User::create([
            'id' => 75,
            'name' => 'Biloliddin',
            'surname' => "Ibragimov",
            'email' => 'biloliddin@gmail.com',
            'phone' => '931255765',
            'password' => bcrypt('931255765'),
            'status' => 4,
        ]);
        $user->assignRole([$role->id]);
        $user->langs()->sync(Lang::select('id')->inRandomOrder()->first()->id);

        $user = User::create([
            'id' => 76,
            'name' => 'Lochinbek',
            'surname' => "Ergashev",
            'email' => 'lochinbek@gmail.com',
            'phone' => '945327441',
            'password' => bcrypt('945327441'),
            'status' => 4,
        ]);
        $user->assignRole([$role->id]);
        $user->langs()->sync(Lang::select('id')->inRandomOrder()->first()->id);

        $user = User::create([
            'id' => 77,
            'name' => 'Azimjon',
            'surname' => "Zokirov",
            'email' => 'azimjon@gmail.com',
            'phone' => '998286613',
            'password' => bcrypt('998286613'),
            'status' => 4,
        ]);
        $user->assignRole([$role->id]);
        $user->langs()->sync(Lang::select('id')->inRandomOrder()->first()->id);

        $user = User::create([
            'id' => 78,
            'name' => 'Malika',
            'surname' => "Rasulova",
            'email' => 'malika@gmail.com',
            'phone' => '880342280',
            'password' => bcrypt('880342280'),
            'status' => 4,
        ]);
        $user->assignRole([$role->id]);
        $user->langs()->sync(Lang::select('id')->inRandomOrder()->first()->id);

        $user = User::create([
            'id' => 79,
            'name' => 'Mehrojiddin',
            'surname' => "Momatqulov",
            'email' => 'mehrojiddin@gmail.com',
            'phone' => '959115056',
            'password' => bcrypt('959115056'),
            'status' => 4,
        ]);
        $user->assignRole([$role->id]);
        $user->langs()->sync(Lang::select('id')->inRandomOrder()->first()->id);

        // C-0103
        $user = User::create([
            'id' => 80,
            'name' => 'Umid',
            'surname' => "Nizomov",
            'email' => 'umid@gmail.com',
            'phone' => '500717500',
            'password' => bcrypt('500717500'),
            'status' => 4,
        ]);
        $user->assignRole([$role->id]);
        $user->langs()->sync(Lang::select('id')->inRandomOrder()->first()->id);

        $user = User::create([
            'id' => 81,
            'name' => 'Abdurahmon',
            'surname' => "Rustamov",
            'email' => 'abdurahmon@gmail.com',
            'phone' => '950236988',
            'password' => bcrypt('950236988'),
            'status' => 4,
        ]);
        $user->assignRole([$role->id]);
        $user->langs()->sync(Lang::select('id')->inRandomOrder()->first()->id);

        $user = User::create([
            'id' => 82,
            'name' => 'Dildora',
            'surname' => "Panjiyeva",
            'email' => 'dildora@gmail.com',
            'phone' => '912257434',
            'password' => bcrypt('912257434'),
            'status' => 4,
        ]);
        $user->assignRole([$role->id]);
        $user->langs()->sync(Lang::select('id')->inRandomOrder()->first()->id);

        $user = User::create([
            'id' => 83,
            'name' => 'Samandar',
            'surname' => "Vahidov",
            'email' => 'samandar@gmail.com',
            'phone' => '974292075',
            'password' => bcrypt('974292075'),
            'status' => 4,
        ]);
        $user->assignRole([$role->id]);
        $user->langs()->sync(Lang::select('id')->inRandomOrder()->first()->id);

        $user = User::create([
            'id' => 84,
            'name' => 'Komoliddin',
            'surname' => "Abduvaliyev",
            'email' => 'komoliddin@gmail.com',
            'phone' => '947812412',
            'password' => bcrypt('947812412'),
            'status' => 4,
        ]);
        $user->assignRole([$role->id]);
        $user->langs()->sync(Lang::select('id')->inRandomOrder()->first()->id);

        $user = User::create([
            'id' => 85,
            'name' => 'Sharofat',
            'surname' => "Qobilova",
            'email' => 'sharofat@gmail.com',
            'phone' => '935553127',
            'password' => bcrypt('935553127'),
            'status' => 4,
        ]);
        $user->assignRole([$role->id]);
        $user->langs()->sync(Lang::select('id')->inRandomOrder()->first()->id);

        $user = User::create([
            'id' => 86,
            'name' => 'Dilfuza',
            'surname' => "Amitova",
            'email' => 'dilfuza@gmail.com',
            'phone' => '901176714',
            'password' => bcrypt('901176714'),
            'status' => 4,
        ]);
        $user->assignRole([$role->id]);
        $user->langs()->sync(Lang::select('id')->inRandomOrder()->first()->id);

        $user = User::create([
            'id' => 87,
            'name' => 'Hojiakbar',
            'surname' => "Abdumalikov",
            'email' => 'hojiakbar@gmail.com',
            'phone' => '881115949',
            'password' => bcrypt('881115949'),
            'status' => 4,
        ]);
        $user->assignRole([$role->id]);
        $user->langs()->sync(Lang::select('id')->inRandomOrder()->first()->id);

        $user = User::create([
            'id' => 88,
            'name' => 'Nodir',
            'surname' => "Ahmadjonov",
            'email' => 'nodir@gmail.com',
            'phone' => '998130311',
            'password' => bcrypt('998130311'),
            'status' => 4,
        ]);
        $user->assignRole([$role->id]);
        $user->langs()->sync(Lang::select('id')->inRandomOrder()->first()->id);

        $user = User::create([
            'id' => 89,
            'name' => 'Nazokat',
            'surname' => "Yunusova",
            'email' => 'nazokat@gmail.com',
            'phone' => '938820788',
            'password' => bcrypt('938820788'),
            'status' => 4,
        ]);
        $user->assignRole([$role->id]);
        $user->langs()->sync(Lang::select('id')->inRandomOrder()->first()->id);

        $user = User::create([
            'id' => 90,
            'name' => 'Ahrorbek',
            'surname' => "Nurvohidov",
            'email' => 'ahrorbek@gmail.com',
            'phone' => '946813565',
            'password' => bcrypt('946813565'),
            'status' => 4,
        ]);
        $user->assignRole([$role->id]);
        $user->langs()->sync(Lang::select('id')->inRandomOrder()->first()->id);

        // C-0906
        $user = User::create([
            'id' => 91,
            'name' => 'Ozodbek',
            'surname' => "Sadullayev",
            'email' => 'ozodbek@gmail.com',
            'phone' => '883912114',
            'password' => bcrypt('883912114'),
            'status' => 4,
        ]);
        $user->assignRole([$role->id]);
        $user->langs()->sync(Lang::select('id')->inRandomOrder()->first()->id);

        $user = User::create([
            'id' => 92,
            'name' => 'Fayzulloh',
            'surname' => "Abdurazzoqov",
            'email' => 'fayzulloh@gmail.com',
            'phone' => '946529852',
            'password' => bcrypt('946529852'),
            'status' => 4,
        ]);
        $user->assignRole([$role->id]);
        $user->langs()->sync(Lang::select('id')->inRandomOrder()->first()->id);

        // C-1201
        $user = User::create([
            'id' => 93,
            'name' => 'Abdurazzoq',
            'surname' => "Hudoyberdiyev",
            'email' => 'abdurazzoq@gmail.com',
            'phone' => '950330734',
            'password' => bcrypt('950330734'),
            'status' => 4,
        ]);
        $user->assignRole([$role->id]);
        $user->langs()->sync(Lang::select('id')->inRandomOrder()->first()->id);

        $user = User::create([
            'id' => 94,
            'name' => 'Mohinur',
            'surname' => "Meliqoziyeva",
            'email' => 'mohinur@gmail.com',
            'phone' => '999906151',
            'password' => bcrypt('999906151'),
            'status' => 4,
        ]);
        $user->assignRole([$role->id]);
        $user->langs()->sync(Lang::select('id')->inRandomOrder()->first()->id);

        $user = User::create([
            'id' => 95,
            'name' => 'Dilorom',
            'surname' => "Imonqulova",
            'email' => 'dilorom@gmail.com',
            'phone' => '993134901',
            'password' => bcrypt('993134901'),
            'status' => 4,
        ]);
        $user->assignRole([$role->id]);
        $user->langs()->sync(Lang::select('id')->inRandomOrder()->first()->id);

        $user = User::create([
            'id' => 96,
            'name' => 'Umida',
            'surname' => "Mansurova",
            'email' => 'umida@gmail.com',
            'phone' => '977326369',
            'password' => bcrypt('977326369'),
            'status' => 4,
        ]);
        $user->assignRole([$role->id]);
        $user->langs()->sync(Lang::select('id')->inRandomOrder()->first()->id);

        $user = User::create([
            'id' => 97,
            'name' => 'Halima',
            'surname' => "Sultonova",
            'email' => 'halima@gmail.com',
            'phone' => '903357017',
            'password' => bcrypt('903357017'),
            'status' => 4,
        ]);
        $user->assignRole([$role->id]);
        $user->langs()->sync(Lang::select('id')->inRandomOrder()->first()->id);

        $user = User::create([
            'id' => 98,
            'name' => 'Sanjarhoja',
            'surname' => "Jo'raboyev",
            'email' => 'sanjarhoja@gmail.com',
            'phone' => '996206009',
            'password' => bcrypt('996206009'),
            'status' => 4,
        ]);
        $user->assignRole([$role->id]);
        $user->langs()->sync(Lang::select('id')->inRandomOrder()->first()->id);

        $user = User::create([
            'id' => 99,
            'name' => 'Sirojiddin',
            'surname' => "Shodiqulov",
            'email' => 'sirojiddin@gmail.com',
            'phone' => '949773305',
            'password' => bcrypt('949773305'),
            'status' => 4,
        ]);
        $user->assignRole([$role->id]);
        $user->langs()->sync(Lang::select('id')->inRandomOrder()->first()->id);

        $user = User::create([
            'id' => 100,
            'name' => 'Otabek',
            'surname' => "Jumanazorov",
            'email' => 'otabek@gmail.com',
            'phone' => '936510919',
            'password' => bcrypt('936510919'),
            'status' => 4,
        ]);
        $user->assignRole([$role->id]);
        $user->langs()->sync(Lang::select('id')->inRandomOrder()->first()->id);

        $user = User::create([
            'id' => 101,
            'name' => 'Nafisa',
            'surname' => "Abdugafurova",
            'email' => 'nafisa@gmail.com',
            'phone' => '951640301',
            'password' => bcrypt('951640301'),
            'status' => 4,
        ]);
        $user->assignRole([$role->id]);
        $user->langs()->sync(Lang::select('id')->inRandomOrder()->first()->id);

        // C-0704
        $user = User::create([
            'id' => 102,
            'name' => 'Muhammadumar',
            'surname' => "Salimov",
            'email' => 'muhammadumar@gmail.com',
            'phone' => '907885660',
            'password' => bcrypt('907885660'),
            'status' => 4,
        ]);
        $user->assignRole([$role->id]);
        $user->langs()->sync(Lang::select('id')->inRandomOrder()->first()->id);

        // C-0304
        $user = User::create([
            'id' => 103,
            'name' => 'Damir',
            'surname' => "Nematjonov",
            'email' => 'damir@gmail.com',
            'phone' => '933787766',
            'password' => bcrypt('933787766'),
            'status' => 4,
        ]);
        $user->assignRole([$role->id]);
        $user->langs()->sync(Lang::select('id')->inRandomOrder()->first()->id);

        $user = User::create([
            'id' => 104,
            'name' => 'Laziza',
            'surname' => "Ziyotova",
            'email' => 'laziza@gmail.com',
            'phone' => '950352261',
            'password' => bcrypt('950352261'),
            'status' => 4,
        ]);
        $user->assignRole([$role->id]);
        $user->langs()->sync(Lang::select('id')->inRandomOrder()->first()->id);
        // C-0401
        $user = User::create([
            'id' => 105,
            'name' => 'Nodirbek',
            'surname' => "Aliyev",
            'email' => 'nodirbek@gmail.com',
            'phone' => '997880750',
            'password' => bcrypt('997880750'),
            'status' => 4,
        ]);
        $user->assignRole([$role->id]);
        $user->langs()->sync(Lang::select('id')->inRandomOrder()->first()->id);

        $user = User::create([
            'id' => 106,
            'name' => 'Umid',
            'surname' => "Holmurodov",
            'email' => 'umid@gmail.com',
            'phone' => '919004884',
            'password' => bcrypt('919004884'),
            'status' => 4,
        ]);
        $user->assignRole([$role->id]);
        $user->langs()->sync(Lang::select('id')->inRandomOrder()->first()->id);

        // C-0602
        $user = User::create([
            'id' => 107,
            'name' => 'Kamron',
            'surname' => "Hasanov",
            'email' => 'kamron@gmail.com',
            'phone' => '903922908',
            'password' => bcrypt('903922908'),
            'status' => 4,
        ]);
        $user->assignRole([$role->id]);
        $user->langs()->sync(Lang::select('id')->inRandomOrder()->first()->id);

        $user = User::create([
            'id' => 108,
            'name' => 'Humora',
            'surname' => "Qobilova",
            'email' => 'humora@gmail.com',
            'phone' => '935527717',
            'password' => bcrypt('935527717'),
            'status' => 4,
        ]);
        $user->assignRole([$role->id]);
        $user->langs()->sync(Lang::select('id')->inRandomOrder()->first()->id);

        $user = User::create([
            'id' => 109,
            'name' => 'Samandar',
            'surname' => "Ahmadjonov",
            'email' => 'samandar@gmail.com',
            'phone' => '909432486',
            'password' => bcrypt('909432486'),
            'status' => 4,
        ]);
        $user->assignRole([$role->id]);
        $user->langs()->sync(Lang::select('id')->inRandomOrder()->first()->id);

        $user = User::create([
            'id' => 110,
            'name' => 'MuhammadSolih',
            'surname' => "Tohirov",
            'email' => 'MuhammadSolih@gmail.com',
            'phone' => '995360912',
            'password' => bcrypt('995360912'),
            'status' => 4,
        ]);
        $user->assignRole([$role->id]);
        $user->langs()->sync(Lang::select('id')->inRandomOrder()->first()->id);

        $user = User::create([
            'id' => 111,
            'name' => 'Sayyora',
            'surname' => "Abdullayeva",
            'email' => 'sayyora@gmail.com',
            'phone' => '974400133',
            'password' => bcrypt('974400133'),
            'status' => 4,
        ]);
        $user->assignRole([$role->id]);
        $user->langs()->sync(Lang::select('id')->inRandomOrder()->first()->id);

        $user = User::create([
            'id' => 112,
            'name' => 'Rustam',
            'surname' => "Jumaniyozov",
            'email' => 'rustam@gmail.com',
            'phone' => '977070148',
            'password' => bcrypt('977070148'),
            'status' => 4,
        ]);
        $user->assignRole([$role->id]);
        $user->langs()->sync(Lang::select('id')->inRandomOrder()->first()->id);

        // C-0117
        $user = User::create([
            'id' => 113,
            'name' => 'Saidamirhon',
            'surname' => "Topohojayev",
            'email' => 'saidamirhon@gmail.com',
            'phone' => '772681474',
            'password' => bcrypt('772681474'),
            'status' => 4,
        ]);
        $user->assignRole([$role->id]);
        $user->langs()->sync(Lang::select('id')->inRandomOrder()->first()->id);
        // C-0210
        $user = User::create([
            'id' => 114,
            'name' => 'Mashhura',
            'surname' => "Berdiyeva",
            'email' => 'mashhura@gmail.com',
            'phone' => '946124774',
            'password' => bcrypt('946124774'),
            'status' => 4,
        ]);
        $user->assignRole([$role->id]);
        $user->langs()->sync(Lang::select('id')->inRandomOrder()->first()->id);

        $user = User::create([
            'id' => 115,
            'name' => 'Maria',
            'surname' => "Abduvaitova",
            'email' => 'maria@gmail.com',
            'phone' => '900635373',
            'password' => bcrypt('900635373'),
            'status' => 4,
        ]);
        $user->assignRole([$role->id]);
        $user->langs()->sync(Lang::select('id')->inRandomOrder()->first()->id);

        $user = User::create([
            'id' => 116,
            'name' => 'Shahzod',
            'surname' => "Rahimov",
            'email' => 'shahzod@gmail.com',
            'phone' => '930009882',
            'password' => bcrypt('930009882'),
            'status' => 4,
        ]);
        $user->assignRole([$role->id]);
        $user->langs()->sync(Lang::select('id')->inRandomOrder()->first()->id);

        $user = User::create([
            'id' => 117,
            'name' => 'Azizbek',
            'surname' => "Matchanov",
            'email' => 'azizbek@gmail.com',
            'phone' => '977754425',
            'password' => bcrypt('977754425'),
            'status' => 4,
        ]);
        $user->assignRole([$role->id]);
        $user->langs()->sync(Lang::select('id')->inRandomOrder()->first()->id);

        $user = User::create([
            'id' => 118,
            'name' => "Go'zal",
            'surname' => "Bekchanova",
            'email' => 'guzal@gmail.com',
            'phone' => '900157976',
            'password' => bcrypt('900157976'),
            'status' => 4,
        ]);
        $user->assignRole([$role->id]);
        $user->langs()->sync(Lang::select('id')->inRandomOrder()->first()->id);

        $user = User::create([
            'id' => 119,
            'name' => "Doniyor",
            'surname' => "Tulamatov",
            'email' => 'doniyor@gmail.com',
            'phone' => '958821133',
            'password' => bcrypt('958821133'),
            'status' => 4,
        ]);
        $user->assignRole([$role->id]);
        $user->langs()->sync(Lang::select('id')->inRandomOrder()->first()->id);

        $user = User::create([
            'id' => 120,
            'name' => "Ilhom",
            'surname' => "Sodirov",
            'email' => 'ilhom@gmail.com',
            'phone' => '946766773',
            'password' => bcrypt('946766773'),
            'status' => 4,
        ]);
        $user->assignRole([$role->id]);
        $user->langs()->sync(Lang::select('id')->inRandomOrder()->first()->id);

        // C-0306
        $user = User::create([
            'id' => 121,
            'name' => "Dildora",
            'surname' => "Hamroyeva",
            'email' => 'dildora@gmail.com',
            'phone' => '900981125',
            'password' => bcrypt('900981125'),
            'status' => 4,
        ]);
        $user->assignRole([$role->id]);
        $user->langs()->sync(Lang::select('id')->inRandomOrder()->first()->id);

        $user = User::create([
            'id' => 122,
            'name' => "Muhammadali",
            'surname' => "Muhtarov",
            'email' => 'muhammadali@gmail.com',
            'phone' => '910031139',
            'password' => bcrypt('910031139'),
            'status' => 4,
        ]);
        $user->assignRole([$role->id]);
        $user->langs()->sync(Lang::select('id')->inRandomOrder()->first()->id);

        $user = User::create([
            'id' => 123,
            'name' => "Hilola",
            'surname' => "Mamasoliyeva",
            'email' => 'hilola@gmail.com',
            'phone' => '940081828',
            'password' => bcrypt('940081828'),
            'status' => 4,
        ]);
        $user->assignRole([$role->id]);
        $user->langs()->sync(Lang::select('id')->inRandomOrder()->first()->id);

        $user = User::create([
            'id' => 124,
            'name' => "Sirojiddin",
            'surname' => "Davlatjonov",
            'email' => 'sirojiddin@gmail.com',
            'phone' => '991737856',
            'password' => bcrypt('991737856'),
            'status' => 4,
        ]);
        $user->assignRole([$role->id]);
        $user->langs()->sync(Lang::select('id')->inRandomOrder()->first()->id);

        $user = User::create([
            'id' => 125,
            'name' => "Botirbek",
            'surname' => "Nazarov",
            'email' => 'botirbek@gmail.com',
            'phone' => '999167496',
            'password' => bcrypt('999167496'),
            'status' => 4,
        ]);
        $user->assignRole([$role->id]);
        $user->langs()->sync(Lang::select('id')->inRandomOrder()->first()->id);

        $user = User::create([
            'id' => 126,
            'name' => "Sardor",
            'surname' => "No'mov",
            'email' => 'sardor@gmail.com',
            'phone' => '998000564',
            'password' => bcrypt('998000564'),
            'status' => 4,
        ]);
        $user->assignRole([$role->id]);
        $user->langs()->sync(Lang::select('id')->inRandomOrder()->first()->id);
        // C-0202
        $user = User::create([
            'id' => 127,
            'name' => "Nurihon",
            'surname' => "Fazilbekova",
            'email' => 'nurihon@gmail.com',
            'phone' => '938095599',
            'password' => bcrypt('938095599'),
            'status' => 4,
        ]);
        $user->assignRole([$role->id]);
        $user->langs()->sync(Lang::select('id')->inRandomOrder()->first()->id);

        $user = User::create([
            'id' => 128,
            'name' => "Robiya",
            'surname' => "Ibrohimova",
            'email' => 'robiya@gmail.com',
            'phone' => '999351754',
            'password' => bcrypt('999351754'),
            'status' => 4,
        ]);
        $user->assignRole([$role->id]);
        $user->langs()->sync(Lang::select('id')->inRandomOrder()->first()->id);

        $user = User::create([
            'id' => 129,
            'name' => "Kamila",
            'surname' => "Aslanova",
            'email' => 'kamila@gmail.com',
            'phone' => '944111525',
            'password' => bcrypt('944111525'),
            'status' => 4,
        ]);
        $user->assignRole([$role->id]);
        $user->langs()->sync(Lang::select('id')->inRandomOrder()->first()->id);

        $user = User::create([
            'id' => 130,
            'name' => "Rasulbek",
            'surname' => "Shavkatjonov",
            'email' => 'rasulbek@gmail.com',
            'phone' => '946483003',
            'password' => bcrypt('946483003'),
            'status' => 4,
        ]);
        $user->assignRole([$role->id]);
        $user->langs()->sync(Lang::select('id')->inRandomOrder()->first()->id);

        $user = User::create([
            'id' => 131,
            'name' => "Zohidjon",
            'surname' => "Abduganiyev",
            'email' => 'zohidjon@gmail.com',
            'phone' => '933861672',
            'password' => bcrypt('933861672'),
            'status' => 4,
        ]);
        $user->assignRole([$role->id]);
        $user->langs()->sync(Lang::select('id')->inRandomOrder()->first()->id);

        $user = User::create([
            'id' => 132,
            'name' => "Feruza",
            'surname' => "Ortiqova",
            'email' => 'feruza@gmail.com',
            'phone' => '977538780',
            'password' => bcrypt('977538780'),
            'status' => 4,
        ]);
        $user->assignRole([$role->id]);
        $user->langs()->sync(Lang::select('id')->inRandomOrder()->first()->id);

        $user = User::create([
            'id' => 133,
            'name' => "Ronaldu",
            'surname' => "Begamov",
            'email' => 'ronaldu@gmail.com',
            'phone' => '981600717',
            'password' => bcrypt('981600717'),
            'status' => 4,
        ]);
        $user->assignRole([$role->id]);
        $user->langs()->sync(Lang::select('id')->inRandomOrder()->first()->id);

        $user = User::create([
            'id' => 134,
            'name' => "Altun",
            'surname' => "Shafikova",
            'email' => 'altun@gmail.com',
            'phone' => '906812106',
            'password' => bcrypt('906812106'),
            'status' => 4,
        ]);
        $user->assignRole([$role->id]);
        $user->langs()->sync(Lang::select('id')->inRandomOrder()->first()->id);

        // C-1005
        $user = User::create([
            'id' => 135,
            'name' => "Dilnoza",
            'surname' => "Ahmadjonova",
            'email' => 'dilnoza@gmail.com',
            'phone' => '947835577',
            'password' => bcrypt('947835577'),
            'status' => 4,
        ]);
        $user->assignRole([$role->id]);
        $user->langs()->sync(Lang::select('id')->inRandomOrder()->first()->id);

        $user = User::create([
            'id' => 136,
            'name' => "Ohistabonu",
            'surname' => "Sardorbekova",
            'email' => 'ohistabonu@gmail.com',
            'phone' => '946122892',
            'password' => bcrypt('946122892'),
            'status' => 4,
        ]);
        $user->assignRole([$role->id]);
        $user->langs()->sync(Lang::select('id')->inRandomOrder()->first()->id);

        $user = User::create([
            'id' => 137,
            'name' => "Shohjahon",
            'surname' => "Dilshodov",
            'email' => 'shohjahon@gmail.com',
            'phone' => '900632633',
            'password' => bcrypt('900632633'),
            'status' => 4,
        ]);
        $user->assignRole([$role->id]);
        $user->langs()->sync(Lang::select('id')->inRandomOrder()->first()->id);

        $user = User::create([
            'id' => 138,
            'name' => "Abduqodir",
            'surname' => "Nortoshov",
            'email' => 'abduqodir@gmail.com',
            'phone' => '900095877',
            'password' => bcrypt('900095877'),
            'status' => 4,
        ]);
        $user->assignRole([$role->id]);
        $user->langs()->sync(Lang::select('id')->inRandomOrder()->first()->id);

        $user = User::create([
            'id' => 139,
            'name' => "Dilso'z",
            'surname' => "Nurquvatovz",
            'email' => 'dilsoz@gmail.com',
            'phone' => '930428274',
            'password' => bcrypt('930428274'),
            'status' => 4,
        ]);
        $user->assignRole([$role->id]);
        $user->langs()->sync(Lang::select('id')->inRandomOrder()->first()->id);

        // C-0203
        $user = User::create([
            'id' => 140,
            'name' => "Sanjana",
            'surname' => "Ochildiyeva",
            'email' => 'sanjana@gmail.com',
            'phone' => '991771386',
            'password' => bcrypt('991771386'),
            'status' => 4,
        ]);
        $user->assignRole([$role->id]);
        $user->langs()->sync(Lang::select('id')->inRandomOrder()->first()->id);

        $user = User::create([
            'id' => 141,
            'name' => "Hadicha",
            'surname' => "Hadjayeva",
            'email' => 'hadicha@gmail.com',
            'phone' => '884978382',
            'password' => bcrypt('884978382'),
            'status' => 4,
        ]);
        $user->assignRole([$role->id]);
        $user->langs()->sync(Lang::select('id')->inRandomOrder()->first()->id);

        $user = User::create([
            'id' => 142,
            'name' => "Charos",
            'surname' => "Sattorova",
            'email' => 'charos@gmail.com',
            'phone' => '949428188',
            'password' => bcrypt('949428188'),
            'status' => 4,
        ]);
        $user->assignRole([$role->id]);
        $user->langs()->sync(Lang::select('id')->inRandomOrder()->first()->id);

        $user = User::create([
            'id' => 143,
            'name' => "Mehruza",
            'surname' => "TYU",
            'email' => 'mehruza@gmail.com',
            'phone' => '770652021',
            'password' => bcrypt('770652021'),
            'status' => 4,
        ]);
        $user->assignRole([$role->id]);
        $user->langs()->sync(Lang::select('id')->inRandomOrder()->first()->id);

        $user = User::create([
            'id' => 144,
            'name' => "Dilshodbek",
            'surname' => "Karimov",
            'email' => 'dilshodbek@gmail.com',
            'phone' => '940443133',
            'password' => bcrypt('940443133'),
            'status' => 4,
        ]);
        $user->assignRole([$role->id]);
        $user->langs()->sync(Lang::select('id')->inRandomOrder()->first()->id);

        $user = User::create([
            'id' => 145,
            'name' => "Nozima",
            'surname' => "Bektorayeva",
            'email' => 'nozima@gmail.com',
            'phone' => '941167679',
            'password' => bcrypt('941167679'),
            'status' => 4,
        ]);
        $user->assignRole([$role->id]);
        $user->langs()->sync(Lang::select('id')->inRandomOrder()->first()->id);

        $user = User::create([
            'id' => 146,
            'name' => "Abrahmon",
            'surname' => "Ramazonov",
            'email' => 'abraham@gmail.com',
            'phone' => '900036995',
            'password' => bcrypt('900036995'),
            'status' => 4,
        ]);
        $user->assignRole([$role->id]);
        $user->langs()->sync(Lang::select('id')->inRandomOrder()->first()->id);

        $user = User::create([
            'id' => 147,
            'name' => "Fazlidin",
            'surname' => "Toychiyev",
            'email' => 'fazlidin@gmail.com',
            'phone' => '974555603',
            'password' => bcrypt('974555603'),
            'status' => 4,
        ]);
        $user->assignRole([$role->id]);
        $user->langs()->sync(Lang::select('id')->inRandomOrder()->first()->id);

        // C-0507
        $user = User::create([
            'id' => 148,
            'name' => "Kamron",
            'surname' => "Bahtiyorov",
            'email' => 'kamron@gmail.com',
            'phone' => '994959992',
            'password' => bcrypt('994959992'),
            'status' => 4,
        ]);
        $user->assignRole([$role->id]);
        $user->langs()->sync(Lang::select('id')->inRandomOrder()->first()->id);

        $user = User::create([
            'id' => 149,
            'name' => "Ruhshona",
            'surname' => "Bahtiyorova",
            'email' => 'ruhshona@gmail.com',
            'phone' => '935316088',
            'password' => bcrypt('935316088'),
            'status' => 4,
        ]);
        $user->assignRole([$role->id]);
        $user->langs()->sync(Lang::select('id')->inRandomOrder()->first()->id);

        $user = User::create([
            'id' => 150,
            'name' => "Husniddin",
            'surname' => "Mamatkarimov",
            'email' => 'husniddin@gmail.com',
            'phone' => '940620226',
            'password' => bcrypt('940620226'),
            'status' => 4,
        ]);
        $user->assignRole([$role->id]);
        $user->langs()->sync(Lang::select('id')->inRandomOrder()->first()->id);

        $user = User::create([
            'id' => 151,
            'name' => "Zebiniso",
            'surname' => "Holboyeva",
            'email' => 'zebiniso@gmail.com',
            'phone' => '991017183',
            'password' => bcrypt('991017183'),
            'status' => 4,
        ]);
        $user->assignRole([$role->id]);
        $user->langs()->sync(Lang::select('id')->inRandomOrder()->first()->id);

        // C-0304.1
        $user = User::create([
            'id' => 152,
            'name' => "Madinabonu",
            'surname' => "Normatova",
            'email' => 'madinabonu@gmail.com',
            'phone' => '997190830',
            'password' => bcrypt('997190830'),
            'status' => 4,
        ]);
        $user->assignRole([$role->id]);
        $user->langs()->sync(Lang::select('id')->inRandomOrder()->first()->id);

        $user = User::create([
            'id' => 153,
            'name' => "Diyora",
            'surname' => "Alimova",
            'email' => 'diyora@gmail.com',
            'phone' => '900081186',
            'password' => bcrypt('900081186'),
            'status' => 4,
        ]);
        $user->assignRole([$role->id]);
        $user->langs()->sync(Lang::select('id')->inRandomOrder()->first()->id);

        $user = User::create([
            'id' => 154,
            'name' => "Mohira",
            'surname' => "Hoshimova",
            'email' => 'mohira@gmail.com',
            'phone' => '990550645',
            'password' => bcrypt('990550645'),
            'status' => 4,
        ]);
        $user->assignRole([$role->id]);
        $user->langs()->sync(Lang::select('id')->inRandomOrder()->first()->id);

        $user = User::create([
            'id' => 155,
            'name' => "Maknuna",
            'surname' => "Usmonova",
            'email' => 'maknuna@gmail.com',
            'phone' => '909375405',
            'password' => bcrypt('909375405'),
            'status' => 4,
        ]);
        $user->assignRole([$role->id]);
        $user->langs()->sync(Lang::select('id')->inRandomOrder()->first()->id);

        $user = User::create([
            'id' => 156,
            'name' => "Maftuna",
            'surname' => "Hikmatova",
            'email' => 'maftuna@gmail.com',
            'phone' => '997286783',
            'password' => bcrypt('997286783'),
            'status' => 4,
        ]);
        $user->assignRole([$role->id]);
        $user->langs()->sync(Lang::select('id')->inRandomOrder()->first()->id);

        $user = User::create([
            'id' => 157,
            'name' => "Shahzoda",
            'surname' => "Rustamova",
            'email' => 'shahzoda@gmail.com',
            'phone' => '917828766',
            'password' => bcrypt('917828766'),
            'status' => 4,
        ]);
        $user->assignRole([$role->id]);
        $user->langs()->sync(Lang::select('id')->inRandomOrder()->first()->id);

        $user = User::create([
            'id' => 158,
            'name' => "Kamola",
            'surname' => "Ahmedova",
            'email' => 'kamola@gmail.com',
            'phone' => '947098002',
            'password' => bcrypt('947098002'),
            'status' => 4,
        ]);
        $user->assignRole([$role->id]);
        $user->langs()->sync(Lang::select('id')->inRandomOrder()->first()->id);

        $user = User::create([
            'id' => 159,
            'name' => "Fotima",
            'surname' => "Abrorjonova",
            'email' => 'fotima@gmail.com',
            'phone' => '901361243',
            'password' => bcrypt('901361243'),
            'status' => 4,
        ]);
        $user->assignRole([$role->id]);
        $user->langs()->sync(Lang::select('id')->inRandomOrder()->first()->id);

        $user = User::create([
            'id' => 160,
            'name' => "Mahliyo",
            'surname' => "Ibadullayeva",
            'email' => 'mahliyo@gmail.com',
            'phone' => '936115253',
            'password' => bcrypt('936115253'),
            'status' => 4,
        ]);
        $user->assignRole([$role->id]);
        $user->langs()->sync(Lang::select('id')->inRandomOrder()->first()->id);

        $user = User::create([
            'id' => 161,
            'name' => "Mubina",
            'surname' => "Umarova",
            'email' => 'mubina@gmail.com',
            'phone' => '990887890',
            'password' => bcrypt('990887890'),
            'status' => 4,
        ]);
        $user->assignRole([$role->id]);
        $user->langs()->sync(Lang::select('id')->inRandomOrder()->first()->id);

        // C-0402
        $user = User::create([
            'id' => 162,
            'name' => "Hadicha",
            'surname' => "Alijonova",
            'email' => 'hadicha@gmail.com',
            'phone' => '555039056',
            'password' => bcrypt('555039056'),
            'status' => 4,
        ]);
        $user->assignRole([$role->id]);
        $user->langs()->sync(Lang::select('id')->inRandomOrder()->first()->id);

        $user = User::create([
            'id' => 163,
            'name' => "Ziyoda",
            'surname' => "Sultonmurodova",
            'email' => 'ziyoda@gmail.com',
            'phone' => '337373003',
            'password' => bcrypt('337373003'),
            'status' => 4,
        ]);
        $user->assignRole([$role->id]);
        $user->langs()->sync(Lang::select('id')->inRandomOrder()->first()->id);

        $user = User::create([
            'id' => 164,
            'name' => "Bunyod",
            'surname' => "Berdiboyev",
            'email' => 'bunyod@gmail.com',
            'phone' => '909424641',
            'password' => bcrypt('909424641'),
            'status' => 4,
        ]);
        $user->assignRole([$role->id]);
        $user->langs()->sync(Lang::select('id')->inRandomOrder()->first()->id);

        $user = User::create([
            'id' => 165,
            'name' => "Farangiz",
            'surname' => "Farhodova",
            'email' => 'farangiz@gmail.com',
            'phone' => '991034473',
            'password' => bcrypt('991034473'),
            'status' => 4,
        ]);
        $user->assignRole([$role->id]);
        $user->langs()->sync(Lang::select('id')->inRandomOrder()->first()->id);

        $user = User::create([
            'id' => 166,
            'name' => "Shohruh",
            'surname' => "Sobirov",
            'email' => 'shohruh@gmail.com',
            'phone' => '948829040',
            'password' => bcrypt('948829040'),
            'status' => 4,
        ]);
        $user->assignRole([$role->id]);
        $user->langs()->sync(Lang::select('id')->inRandomOrder()->first()->id);

        $user = User::create([
            'id' => 167,
            'name' => "Gulsanam",
            'surname' => "Abdullayeva",
            'email' => 'gulsanam@gmail.com',
            'phone' => '901787835',
            'password' => bcrypt('901787835'),
            'status' => 4,
        ]);
        $user->assignRole([$role->id]);
        $user->langs()->sync(Lang::select('id')->inRandomOrder()->first()->id);

        // C-0404
        $user = User::create([
            'id' => 168,
            'name' => "Muhammadali",
            'surname' => "Mahmadiyorov",
            'email' => 'muhammadali@gmail.com',
            'phone' => '946887005',
            'password' => bcrypt('946887005'),
            'status' => 4,
        ]);
        $user->assignRole([$role->id]);
        $user->langs()->sync(Lang::select('id')->inRandomOrder()->first()->id);

        $user = User::create([
            'id' => 169,
            'name' => "Shohruh",
            'surname' => "G'aniyev",
            'email' => 'shohruz@gmail.com',
            'phone' => '908099967',
            'password' => bcrypt('908099967'),
            'status' => 4,
        ]);
        $user->assignRole([$role->id]);
        $user->langs()->sync(Lang::select('id')->inRandomOrder()->first()->id);

        $user = User::create([
            'id' => 170,
            'name' => "Muhammadsulton",
            'surname' => "Tojimatov",
            'email' => 'Muhammadsulton@gmail.com',
            'phone' => '902561004',
            'password' => bcrypt('902561004'),
            'status' => 4,
        ]);
        $user->assignRole([$role->id]);
        $user->langs()->sync(Lang::select('id')->inRandomOrder()->first()->id);

        $user = User::create([
            'id' => 171,
            'name' => "Muhammadaziz",
            'surname' => "Tolipov",
            'email' => 'Muhammadaziz@gmail.com',
            'phone' => '998931996',
            'password' => bcrypt('998931996'),
            'status' => 4,
        ]);
        $user->assignRole([$role->id]);
        $user->langs()->sync(Lang::select('id')->inRandomOrder()->first()->id);

        $user = User::create([
            'id' => 172,
            'name' => "Farzona",
            'surname' => "Azimova",
            'email' => 'farzona@gmail.com',
            'phone' => '998511747',
            'password' => bcrypt('998511747'),
            'status' => 4,
        ]);
        $user->assignRole([$role->id]);
        $user->langs()->sync(Lang::select('id')->inRandomOrder()->first()->id);
        // C-0503
        $user = User::create([
            'id' => 173,
            'name' => "Husnora",
            'surname' => "Akbarova",
            'email' => 'Husnora@gmail.com',
            'phone' => '900266862',
            'password' => bcrypt('900266862'),
            'status' => 4,
        ]);
        $user->assignRole([$role->id]);
        $user->langs()->sync(Lang::select('id')->inRandomOrder()->first()->id);

        // C-1107
        $user = User::create([
            'id' => 174,
            'name' => "Rigina",
            'surname' => "To’lqinova",
            'email' => 'rigina@gmail.com',
            'phone' => '900875575',
            'password' => bcrypt('900875575'),
            'status' => 4,
        ]);
        $user->assignRole([$role->id]);
        $user->langs()->sync(Lang::select('id')->inRandomOrder()->first()->id);

        $user = User::create([
            'id' => 175,
            'name' => "Shohista",
            'surname' => "Madazimova",
            'email' => 'shohista@gmail.com',
            'phone' => '946606619',
            'password' => bcrypt('946606619'),
            'status' => 4,
        ]);
        $user->assignRole([$role->id]);
        $user->langs()->sync(Lang::select('id')->inRandomOrder()->first()->id);

        $user = User::create([
            'id' => 176,
            'name' => "Muslimbek",
            'surname' => "Otamurodov",
            'email' => 'muslimbek@gmail.com',
            'phone' => '933434331',
            'password' => bcrypt('933434331'),
            'status' => 4,
        ]);
        $user->assignRole([$role->id]);
        $user->langs()->sync(Lang::select('id')->inRandomOrder()->first()->id);

        $user = User::create([
            'id' => 177,
            'name' => "Shahrizoda",
            'surname' => "Muhtorova",
            'email' => 'shahrizoda@gmail.com',
            'phone' => '918810448',
            'password' => bcrypt('918810448'),
            'status' => 4,
        ]);
        $user->assignRole([$role->id]);
        $user->langs()->sync(Lang::select('id')->inRandomOrder()->first()->id);

        $user = User::create([
            'id' => 178,
            'name' => "Yahyo",
            'surname' => "Baxtiyorov",
            'email' => 'yahyo@gmail.com',
            'phone' => '770944242',
            'password' => bcrypt('770944242'),
            'status' => 4,
        ]);
        $user->assignRole([$role->id]);
        $user->langs()->sync(Lang::select('id')->inRandomOrder()->first()->id);
        // 0104
        $user = User::create([
            'id' => 179,
            'name' => "Muslima",
            'surname' => "Abdugaforova",
            'email' => 'muslima@gmail.com',
            'phone' => '977575602',
            'password' => bcrypt('977575602'),
            'status' => 4,
        ]);
        $user->assignRole([$role->id]);
        $user->langs()->sync(Lang::select('id')->inRandomOrder()->first()->id);

        $user = User::create([
            'id' => 180,
            'name' => "Jahongir",
            'surname' => "Jo'raboyev",
            'email' => 'Jahongir@gmail.com',
            'phone' => '950601661',
            'password' => bcrypt('950601661'),
            'status' => 4,
        ]);
        $user->assignRole([$role->id]);
        $user->langs()->sync(Lang::select('id')->inRandomOrder()->first()->id);

        // 0302
        $user = User::create([
            'id' => 181,
            'name' => "Diyorbek",
            'surname' => "Matazimov",
            'email' => 'Diyorbek@gmail.com',
            'phone' => '901699709',
            'password' => bcrypt('901699709'),
            'status' => 4,
        ]);
        $user->assignRole([$role->id]);
        $user->langs()->sync(Lang::select('id')->inRandomOrder()->first()->id);

        // 0403
        $user = User::create([
            'id' => 182,
            'name' => "Marjona",
            'surname' => "Abddakimova",
            'email' => 'marjona@gmail.com',
            'phone' => '940011722',
            'password' => bcrypt('940011722'),
            'status' => 4,
        ]);
        $user->assignRole([$role->id]);
        $user->langs()->sync(Lang::select('id')->inRandomOrder()->first()->id);

        $user = User::create([
            'id' => 183,
            'name' => "Jaloliddin",
            'surname' => "Mahmudov",
            'email' => 'jaloliddin@gmail.com',
            'phone' => '946480429',
            'password' => bcrypt('946480429'),
            'status' => 4,
        ]);
        $user->assignRole([$role->id]);
        $user->langs()->sync(Lang::select('id')->inRandomOrder()->first()->id);

        $user = User::create([
            'id' => 184,
            'name' => "Go'zal",
            'surname' => "Mirrahimova",
            'email' => 'guzal@gmail.com',
            'phone' => '990443767',
            'password' => bcrypt('990443767'),
            'status' => 4,
        ]);
        $user->assignRole([$role->id]);
        $user->langs()->sync(Lang::select('id')->inRandomOrder()->first()->id);

        $user = User::create([
            'id' => 185,
            'name' => "Vasila",
            'surname' => "Abidjonova",
            'email' => 'vasila@gmail.com',
            'phone' => '977378406',
            'password' => bcrypt('977378406'),
            'status' => 4,
        ]);
        $user->assignRole([$role->id]);
        $user->langs()->sync(Lang::select('id')->inRandomOrder()->first()->id);

        $user = User::create([
            'id' => 186,
            'name' => "Sayyora",
            'surname' => "Abdullayeva",
            'email' => 'Sayyora@gmail.com',
            'phone' => '974400133',
            'password' => bcrypt('974400133'),
            'status' => 4,
        ]);
        $user->assignRole([$role->id]);
        $user->langs()->sync(Lang::select('id')->inRandomOrder()->first()->id);


    }
}
