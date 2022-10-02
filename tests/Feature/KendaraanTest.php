<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class KendaraanTest extends TestCase
{

    // use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();
    }

    public function test_create_kendaraan()
    {
        $mobil = $this->json('POST', '/api/mobil/add',[
            'mesin' => 'Test Mesin Kendaraan 1',
            'kapasitas' => 6,
            'tipe' => 'sedan'
        ]);

        $response = $this->json('POST', '/api/kendaraan/add',[
            'merk' => 'Fortuni',
            'warna' => 'Hitam',
            'tahun_keluaran' => 2022,
            'harga' => 500000000,
            'tipe' => 1,
            'mobil_id' => $mobil->original['data']->id,
            'tipe' => 100,
        ]);

        $response->assertStatus(200);
        return $response;
    }

    public function test_get_all_data_kendaraan()
    {
        $response = $this->json('GET', '/api/kendaraan');

        $response->assertStatus(200);
    }

    public function test_get_data_kendaraan_by_id()
    {
        $data = $this->test_create_kendaraan();

        $response = $this->json('GET', '/api/kendaraan/'.$data->original['data']->id);

        $response->assertStatus(200);
    }

    public function test_update_data_kendaraan()
    {
        $data = $this->test_create_kendaraan();

        $response = $this->json('POST', '/api/kendaraan/'.$data->original['data']->id.'/update',[
            'merk' => 'Fortuni',
            'warna' => 'Putih',
            'tahun_keluaran' => 2022,
            'harga' => 500000000,
            'tipe' => 1,
            'mobil_id' => $data->original['data']->mobil_id,
            'tipe' => 100,
        ]);

        $response->assertStatus(200);
    }

    public function test_delete_data_kendaraan()
    {
        $data = $this->test_create_kendaraan();

        $response = $this->json('POST', '/api/kendaraan/'.$data->original['data']->id.'/delete');

        $response->assertStatus(200);
    }
}
