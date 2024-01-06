<?php

namespace Database\Seeders;

use App\Models\Lang;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'name' => 'Uzbek',
            ],
            [
                'name' => 'Russian',
            ],
            [
                'name' => 'Turkish',
            ],
        ];
        foreach ($data as $d){
            Lang::create($d);
        }
    }
}
