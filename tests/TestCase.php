<?php

namespace Tests;

use App\Models\Mobil;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    public function setUp(): void
    {
        parent::setUp();
        $this->withoutExceptionHandling();
    }

    public function createMobil($args = [])
    {
        return Mobil::factory()->create($args);
    }
}
