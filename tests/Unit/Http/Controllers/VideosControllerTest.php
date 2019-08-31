<?php

namespace Tests\Unit\Http\Controllers;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

use App\User;
use App\Business;

class VideosControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_Videos_IndexRoute_Unauthorized()
    {
        $response = $this->get(route('videos.index'));

        $response->assertRedirect(route('login'));
    }

    public function test_Videos_AuthUserWithBusinessViewIndexRoute_Status200()
    {
        $user = factory(User::class)->create();
        $this->actingAs($user);
        $business = factory(Business::class)->create([ 'user_id'=>$user->id ]);

        $response = $this->get(route('videos.index'));

        $response->assertStatus(200);
        $response->assertViewHas('page', 'videos.index-page');
    }

    public function test_Videos_CreateRoute_Unauthorized()
    {
        $response = $this->get(route('videos.create'));

        $response->assertRedirect(route('login'));
    }

    public function test_Videos_AuthUserWithBusinessViewCreateRoute_Status200()
    {
        $user = factory(User::class)->create();
        $this->actingAs($user);
        $business = factory(Business::class)->create([ 'user_id'=>$user->id ]);

        $response = $this->get(route('videos.create'));

        $response->assertStatus(200);
        $response->assertViewHas('page', 'videos.create-page');
    }
}
