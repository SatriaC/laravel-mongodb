<?php

namespace Database\Seeders;

use App\Models\Kendaraan;
use App\Models\Motor;
use App\Models\TipeSuspensi;
use App\Models\TipeTransmisi;
use Illuminate\Database\Seeder;

class MotorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tranmisi1 = TipeTransmisi::create([
            'nama' => 'Auto'
        ]);

        $tranmisi2 = TipeTransmisi::create([
            'nama' => 'Manual'
        ]);

        $suspensi1 = TipeSuspensi::create([
            'nama' => 'Pararel Fork'
        ]);

        TipeSuspensi::create([
            'nama' => 'Plunger Rear Suspension'
        ]);

        $suspensi3 = TipeSuspensi::create([
            'nama' => 'Telescopic Fork'
        ]);

        TipeSuspensi::create([
            'nama' => 'Telescopic Up Side Down'
        ]);

        TipeSuspensi::create([
            'nama' => 'Swing Arm Rear Suspension'
        ]);
        $motor1 = Motor::create([
            'mesin'=>'DOHC',
            'tipe_suspensi'=> $suspensi1->id,
            'tipe_transmisi'=> $tranmisi2->id
        ]);
        $motor2 = Motor::create([
            'mesin'=>'SOHC',
            'tipe_suspensi'=> $suspensi3->id,
            'tipe_transmisi'=> $tranmisi1->id
        ]);
        $motor3 = Motor::create([
            'mesin'=>'OHV',
            'tipe_suspensi'=> $suspensi3->id,
            'tipe_transmisi'=> $tranmisi1->id
        ]);

        Kendaraan::create([
            'merk'=>'Biat',
            'warna'=> 'hitam',
            'harga'=> 200000000,
            'tahun_keluaran'=> 2022,
            'tipe'=> 2,
            'motor_id' => $motor1->id,
            'stok'=> 100,
        ]);

        Kendaraan::create([
            'merk'=>'Subra',
            'warna'=> 'merah',
            'harga'=> 220000000,
            'tahun_keluaran'=> 2020,
            'tipe'=> 2,
            'motor_id' => $motor2->id,
            'stok'=> 100,
        ]);

        Kendaraan::create([
            'merk'=>'Bario',
            'harga'=> 300000000,
            'warna'=> 'silver',
            'tahun_keluaran'=> 2021,
            'tipe'=> 2,
            'motor_id' => $motor3->id,
            'stok'=> 100,
        ]);
    }
}
