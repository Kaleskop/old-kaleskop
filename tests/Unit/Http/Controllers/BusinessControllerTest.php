<?php

namespace Tests\Unit\Http\Controllers;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

use App\User;
use App\Business;

class BusinessControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_Business_IndexRoute_Unauthorized()
    {
        $response = $this->get(route('business.index'));

        $response->assertRedirect(route('login'));
    }

    public function test_Business_AuthUserWithBusinessViewIndexRoute_Status200()
    {
        $user = factory(User::class)->create();
        $this->actingAs($user);
        $business = factory(Business::class)->create([ 'user_id'=>$user->id ]);

        $response = $this->get(route('business.index'));

        $response->assertStatus(200);
        $response->assertViewHas('page', 'business.index-page');
    }

    public function test_Business_SubscriptionRoute_Unauthorized()
    {
        $response = $this->get(route('business.subscriptions'));

        $response->assertRedirect(route('login'));
    }

    public function test_Business_AuthUserWithBusinessViewSubscriptionRoute_Status200()
    {
        $user = factory(User::class)->create();
        $this->actingAs($user);
        $business = factory(Business::class)->create([ 'user_id'=>$user->id ]);

        $response = $this->get(route('business.subscriptions'));

        $response->assertStatus(200);
        $response->assertViewHas('page', 'business.subscriptions-page');
    }
}
