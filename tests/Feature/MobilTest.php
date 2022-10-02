<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class MobilTest extends TestCase
{

    // use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();
    }

    public function test_create_mobil()
    {
        $response = $this->json('POST', '/api/mobil/add',[
            'mesin' => 'Test Mesin Mobil 1',
            'kapasitas' => 6,
            'tipe' => 'sedan'
        ]);

        $response->assertStatus(200);
        return $response;
    }

    public function test_get_all_data_mobil()
    {
        $response = $this->json('GET', '/api/mobil');

        $response->assertStatus(200);
    }

    public function test_get_data_mobil_by_id()
    {
        $data = $this->test_create_mobil();

        $response = $this->json('GET', '/api/mobil/'.$data->original['data']->id);

        $response->assertStatus(200);
    }

    public function test_update_data_mobil()
    {
        $data = $this->test_create_mobil();

        $response = $this->json('POST', '/api/mobil/'.$data->original['data']->id.'/update',[
            'mesin' => 'Test Mesin Mobil 1',
            'kapasitas' => 4,
            'tipe' => 'jeep'
        ]);

        $response->assertStatus(200);
    }

    public function test_delete_data_mobil()
    {
        $data = $this->test_create_mobil();

        $response = $this->json('POST', '/api/mobil/'.$data->original['data']->id.'/delete');

        $response->assertStatus(200);
    }
}
