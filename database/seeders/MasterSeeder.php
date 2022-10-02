<?php

namespace Database\Seeders;

use App\Models\TipeSuspensi;
use App\Models\TipeTransmisi;
use Illuminate\Database\Seeder;

class MasterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TipeTransmisi::create([
            'nama' => 'Auto'
        ]);

        TipeTransmisi::create([
            'nama' => 'Manual'
        ]);

        TipeSuspensi::create([
            'nama' => 'Pararel Fork'
        ]);

        TipeSuspensi::create([
            'nama' => 'Plunger Rear Suspension'
        ]);

        TipeSuspensi::create([
            'nama' => 'Telescopic Fork'
        ]);

        TipeSuspensi::create([
            'nama' => 'Telescopic Up Side Down'
        ]);

        TipeSuspensi::create([
            'nama' => 'Swing Arm Rear Suspension'
        ]);
    }
}
