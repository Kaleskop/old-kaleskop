<?php

namespace Tests\Unit\Http\Controllers;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

use App\User;
use App\Business;
use Storage;
use Illuminate\Http\UploadedFile;

class AdvsControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_Advs_IndexRoute_Unauthorized()
    {
        $response = $this->get(route('advs.index'));

        $response->assertRedirect(route('login'));
    }

    public function test_Advs_AuthUserWithBusinessViewIndexRoute_Status200()
    {
        $user = factory(User::class)->create();
        $this->actingAs($user);
        $business = factory(Business::class)->create([ 'user_id'=>$user->id ]);

        $response = $this->get(route('advs.index'));

        $response->assertStatus(200);
        $response->assertViewHas('page', 'advs.index-page');
    }

    public function test_Advs_CreateRoute_Unauthorized()
    {
        $response = $this->get(route('advs.create'));

        $response->assertRedirect(route('login'));
    }

    public function test_Advs_AuthUserWithBusinessViewCreateRoute_Status200()
    {
        $user = factory(User::class)->create();
        $this->actingAs($user);
        $business = factory(Business::class)->create([ 'user_id'=>$user->id ]);

        $response = $this->get(route('advs.create'));

        $response->assertStatus(200);
        $response->assertViewHas('page', 'advs.create-page');
    }
}
