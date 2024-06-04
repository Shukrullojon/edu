<?php

namespace Database\Seeders;

use App\Models\Filial;
use Illuminate\Database\Seeder;

class FilialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Filial::create([
            'name' => 'CITY EDUCATION',
            'address' => 'Shayhontohur',
            'phone' => '998991234567',
            'status' => 1,
            'room_count' => 10,
        ]);
    }
}
