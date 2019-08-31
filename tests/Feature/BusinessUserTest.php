<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

use App\Business;
use App\User;
use Storage;
use Illuminate\Http\UploadedFile;
use App\Video;
use App\Adv;

class BusinessUserTest extends TestCase
{
    use RefreshDatabase;

    protected $purchased_plan = [ 'plan'=>'plan_F7VBkOHU297sxU', 'stripeToken'=>'tok_visa' ];

    public function test_BusinessUser_CanUploadVideos_FileExists()
    {
        Storage::fake('s3');

        $user = factory(User::class)->create();
        $business = factory(Business::class)->create([ 'user_id'=>$user->id ]);
        $this->actingAs($user);

        $file = UploadedFile::fake()->create('fakevideo.mp4', 15200);
        $response = $this->post(route('videos.upload'), [ 'uservideo'=>$file ]);

        $filepath = "{$business->folder}/videos/{$file->hashName()}";
        $response->assertRedirect(route('videos.index'));
        Storage::disk('s3')->assertExists($filepath);
        $this->assertDatabaseHas('videos', [ 'path'=>$filepath ]);
    }

    public function test_BusinessUser_CanDeleteUploadedVideos_FileMissing()
    {
        Storage::fake('s3');

        $user = factory(User::class)->create();
        $business = factory(Business::class)->create([ 'user_id'=>$user->id ]);
        $this->actingAs($user);
        $file = UploadedFile::fake()->create('fakevideo.mp4', 15200);
        $this->post(route('videos.upload'), [ 'uservideo'=>$file ]);

        $video = $business->videos()->first();
        $response = $this->from(route('videos.index'))->delete(route('videos.destroy', $video));

        $response->assertRedirect(route('videos.index'));
        Storage::disk('s3')->assertMissing($video->path);
        $this->assertDatabaseMissing('videos', [ 'path'=>$video->path ]);
    }

    public function test_BusinessUser_CanInsertAnAdvertisement_HasAdv()
    {
        Storage::fake('s3');

        $user = factory(User::class)->create();
        $business = factory(Business::class)->create([ 'user_id'=>$user->id ]);
        $this->actingAs($user);
        $video = factory(Video::class)->create([ 'business_id'=>$business->id ]);
        $file = UploadedFile::fake()->create('fakeimage.jpg', 600);

        $adv = factory(Adv::class)->make([ 'video_id'=>$video->id ]);
        $data = $adv->toArray();
        $data['userimage'] = $file;
        $response = $this->post(route('advs.store'), $data);

        $path = "{$business->folder}/images/{$file->hashName()}";
        $response->assertRedirect(route('advs.index'));
        $this->assertDatabaseHas('advs', [ 'title'=>$data['title'], 'cover_path'=>$path ]);
        Storage::disk('s3')->assertExists($path);
    }

    public function test_BusinessUser_CanDeleteAnAdvertisement_SoftDeleted()
    {
        Storage::fake('s3');

        $user = factory(User::class)->create();
        $business = factory(Business::class)->create([ 'user_id'=>$user->id ]);
        $this->actingAs($user);
        $adv = factory(Adv::class)->create([ 'business_id'=>$business->id ]);

        $response = $this->from(route('advs.index'))->delete(route('advs.destroy', $adv));

        $response->assertRedirect(route('advs.index'));
        $this->assertSoftDeleted('advs', [ 'id'=>$adv->id ]);
    }

    public function test_BusinessUser_CanSubscribeToPlan_HasSubscription()
    {
        Storage::fake('s3');

        $user = factory(User::class)->create();
        $business = factory(Business::class)->create([ 'user_id'=>$user->id ]);
        $this->actingAs($user);

        $response = $this->post(route('subscriptions.subscribe'), $this->purchased_plan);

        $response->assertRedirect(route('subscriptions.index'));
        $this->assertDatabaseHas('subscriptions', [ 'business_id'=>$business->id ]);
    }
}
