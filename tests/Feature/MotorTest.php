<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class MotorTest extends TestCase
{

    // use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();
    }

    public function test_create_tipe_transmisi()
    {
        $response = $this->json('POST', '/api/tipe-transmisi/add',[
            'nama' => 'Auto',
        ]);

        $response->assertStatus(200);
        return $response;
    }

    public function test_create_tipe_suspensi()
    {
        $response = $this->json('POST', '/api/tipe-suspensi/add',[
            'nama' => 'Pararel Fork',
        ]);

        $response->assertStatus(200);
        return $response;
    }

    public function test_create_motor()
    {
        $transmisi = $this->test_create_tipe_transmisi();
        $suspensi = $this->test_create_tipe_suspensi();
        $response = $this->json('POST', '/api/motor/add',[
            'mesin' => 'Test Mesin Motor 1',
            'tipe_suspensi' => $suspensi->original['data']->id,
            'tipe_transmisi' => $transmisi->original['data']->id,
        ]);

        $response->assertStatus(200);
        return $response;
    }

    public function test_get_all_data_motor()
    {
        $response = $this->json('GET', '/api/motor');

        $response->assertStatus(200);
    }

    public function test_get_data_motor_by_id()
    {
        $data = $this->test_create_motor();

        $response = $this->json('GET', '/api/motor/'.$data->original['data']->id);

        $response->assertStatus(200);
    }

    public function test_update_data_motor()
    {
        $data = $this->test_create_motor();
        $transmisi = $this->test_create_tipe_transmisi();
        $suspensi = $this->test_create_tipe_suspensi();

        $response = $this->json('POST', '/api/motor/'.$data->original['data']->id.'/update',[
            'mesin' => 'HOSC',
            'tipe_suspensi' => $suspensi->original['data']->id,
            'tipe_transmisi' => $transmisi->original['data']->id,
        ]);

        $response->assertStatus(200);
    }

    public function test_delete_data_motor()
    {
        $data = $this->test_create_motor();

        $response = $this->json('POST', '/api/motor/'.$data->original['data']->id.'/delete');

        $response->assertStatus(200);
    }
}
