<?php

namespace Database\Seeders;

use App\Models\Day;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DaySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'name' => 'Every Day',
            ],
            [
                'name' => 'Dush-Chor-Juma',
            ],
            [
                'name' => 'Sesh-Pay-Shan',
            ],
            [
                'name' => 'Dushanba',
            ],
            [
                'name' => 'Seshanba',
            ],
            [
                'name' => 'Chorshanba',
            ],
            [
                'name' => 'Payshanba',
            ],
            [
                'name' => 'Juma',
            ],
            [
                'name' => 'Shanba',
            ],
            [
                'name' => 'Yakshanba',
            ],
        ];
        foreach ($data as $d){
            Day::create($d);
        }
    }
}
