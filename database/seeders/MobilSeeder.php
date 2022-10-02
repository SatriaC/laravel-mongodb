<?php

namespace Database\Seeders;

use App\Models\Kendaraan;
use App\Models\Mobil;
use Illuminate\Database\Seeder;

class MobilSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $mobil1 = Mobil::create([
            'mesin'=>'Two Stroke',
            'kapasitas'=> 4,
            'tipe'=> 'Sedan'
        ]);
        $mobil2 = Mobil::create([
            'mesin'=>'Four Stroke',
            'kapasitas'=> 6,
            'tipe'=> 'Jeep'
        ]);
        $mobil3 = Mobil::create([
            'mesin'=>'Six Stroke',
            'kapasitas'=> 6,
            'tipe'=> 'Jeep'
        ]);

        Kendaraan::create([
            'merk'=>'Pajiro',
            'warna'=> 'hitam',
            'tahun_keluaran'=> 2022,
            'tipe'=> 1,
            'mobil_id' => $mobil1->id,
            'stok'=> 100,
        ]);

        Kendaraan::create([
            'merk'=>'Ayva',
            'warna'=> 'merah',
            'tahun_keluaran'=> 2020,
            'tipe'=> 1,
            'mobil_id' => $mobil2->id,
            'stok'=> 100,
        ]);

        Kendaraan::create([
            'merk'=>'Avanda',
            'warna'=> 'silver',
            'tahun_keluaran'=> 2021,
            'tipe'=> 1,
            'mobil_id' => $mobil3->id,
            'stok'=> 100,
        ]);
    }
}
