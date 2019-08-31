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
        Storage::fake('s3');

        $adv = factory(Adv::class)->create();

        $path = $adv->getFolderPath('images');

        $this->assertSame($path, "{$adv->owner->folder}/images");

        $path = $adv->getFolderPath('videos', 'file.mp4');

        $this->assertSame($path, "{$adv->owner->folder}/videos/file.mp4");
    }
}
