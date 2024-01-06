<?php

namespace Database\Seeders;

use App\Models\Event;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $events = [
            [
                'name' => 'Placement Test',
                'status' => 1,
            ],
            [
                'name' => 'No Interes',
                'status' => 1,
            ],
            [
                'name' => 'Probniy',
                'status' => 1,
            ],
            [
                'name' => 'First Lesson',
                'status' => 1,
            ],
            [
                'name' => 'Attend',
                'status' => 1,
            ],
        ];
        foreach ($events as $event){
            Event::create($event);
        }
    }
}
