<?php

namespace Database\Seeders;

use App\Models\PU;
use App\Models\PUR;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PURSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $pu = PU::where('status',2)->get();
        foreach ($pu as $p){
            foreach ($p->pc->ptRand as $t){
                PUR::create([
                    'p_u_id' => $p->id,
                    'p_t_id' => $t->id,
                    'answer' => rand(1,4),
                ]);
            }
        }
    }
}
