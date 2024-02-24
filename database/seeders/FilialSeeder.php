<?php

namespace Database\Seeders;

use App\Models\Filial;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FilialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            'name' => 'CITY EDUCATION',
            'address' => 'Shayhontohur',
            'phone' => '998991234567',
            'status' => 1,
            'room_count' => 10,
        ];
        Filial::create($data);
    }
}
