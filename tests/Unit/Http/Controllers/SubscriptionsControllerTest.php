<?php

namespace Tests\Unit\Http\Controllers;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

use App\User;
use App\Business;

class SubscriptionsControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_Subscriptions_IndexRoute_Unauthorized()
    {
        $response = $this->get(route('subscriptions.index'));

        $response->assertRedirect(route('login'));
    }

    public function test_Subscriptions_AuthUserWithBusinessViewIndexRoute_Status200()
    {
        $user = factory(User::class)->create();
        $this->actingAs($user);
        $business = factory(Business::class)->create([ 'user_id'=>$user->id ]);

        $response = $this->get(route('subscriptions.index'));

        $response->assertStatus(200);
        $response->assertViewHas('page', 'subscriptions.index-page');
    }
}
