<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

use App\Adv;
use Storage;

class AdvTest extends TestCase
{
    use RefreshDatabase;

    public function test_Adv_GetFolderPath_Same()
    {
        $this->assertTrue(true);
    }
}
