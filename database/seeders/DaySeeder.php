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
                'list' => json_encode(['Mon','Tue','Wed','Thu','Fri','Sat'], true),
            ],
            [
                'name' => 'Dush-Chor-Juma',
                'list' => json_encode(['Mon','Wed','Fri'], true),
            ],
            [
                'name' => 'Sesh-Pay-Shan',
                'list' => json_encode(['Tue','Thu','Sat'], true),
            ],
            [
                'name' => 'Dushanba',
                'list' => json_encode(['Mon'], true),
            ],
            [
                'name' => 'Seshanba',
                'list' => json_encode(['Tue'], true),
            ],
            [
                'name' => 'Chorshanba',
                'list' => json_encode(['Wed'], true),
            ],
            [
                'name' => 'Payshanba',
                'list' => json_encode(['Thu'], true),
            ],
            [
                'name' => 'Juma',
                'list' => json_encode(['Fri'], true),
            ],
            [
                'name' => 'Shanba',
                'list' => json_encode(['Sat'], true),
            ],
            [
                'name' => 'Yakshanba',
                'list' => json_encode(['Sun'], true),
            ],
        ];
        foreach ($data as $d){
            Day::create($d);
        }
    }
}
