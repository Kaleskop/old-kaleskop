<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

use App\Business;
use Storage;
use App\Video;

class BusinessTest extends TestCase
{
    use RefreshDatabase;

    public function test_Business_WhenCreatingSaveFolderOnDatabase_HasFolderLabel()
    {
        Storage::fake('s3');

        $business = factory(Business::class)->create();

        $this->assertDatabaseHas('businesses', [ 'id'=>$business->id, 'folder'=>$business->folder ]);
    }

    public function test_Business_WhenCreatingAcceptTermsOfService_NotNull()
    {
        Storage::fake('s3');

        $business = factory(Business::class)->create();

        $this->assertNotNull($business->terms_at);
    }

    public function test_Business_WhenCreatingMakeFolderOnS3_ExistsFolder()
    {
        Storage::fake('s3');

        $business = factory(Business::class)->create();

        Storage::disk( 's3' )->assertExists($business->folder);
    }

    public function test_Business_WhenCreatingCreateStripeCustomer_StripeIdTrue()
    {
        Storage::fake('s3');

        $business = factory(Business::class)->create();

        $this->assertTrue($business->hasStripeId());
    }

    public function test_Business_MayHaveNoMoreThan500Mb_IsOverLimitFalse()
    {
        Storage::fake('s3');

        $business = factory(Business::class)->create();
        $videos = factory(Video::class, 5)->create([ 'business_id'=>$business->id ]);

        $this->assertFalse($business->isOverLimit());
    }

    public function test_Business_CanGoOverLimitOf500Mb_IsOverLimitTrue()
    {
        Storage::fake('s3');

        $business = factory(Business::class)->create();
        // limit set to 500*1024*1024*0.95 = 498073600
        $videos = factory(Video::class)->create([ 'business_id'=>$business->id, 'size'=>498073601 ]);

        $this->assertTrue($business->isOverLimit());
    }
}
