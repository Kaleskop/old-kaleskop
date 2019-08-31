<?php

namespace Tests\Unit\Http\Controllers;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

use App\User;
use App\Business;
use App\Plan;

class PlansControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_Plans_IndexRoute_Unauthorized()
    {
        $response = $this->get(route('plans.index'));

        $response->assertRedirect(route('login'));
    }

    public function test_Plans_AuthUserWithBusinessViewIndexRoute_Status200()
    {
        $user = factory(User::class)->create();
        $this->actingAs($user);
        $business = factory(Business::class)->create([ 'user_id'=>$user->id ]);

        $response = $this->get(route('plans.index'));

        $response->assertStatus(200);
        $response->assertViewHas('page', 'plans.index-page');
    }

    public function test_Plans_CreateRoute_Unauthorized()
    {
        $response = $this->get(route('plans.create'));

        $response->assertRedirect(route('login'));
    }

    public function test_Plans_AuthUserWithBusinessViewCreateRoute_Status200()
    {
        $user = factory(User::class)->create();
        $this->actingAs($user);
        $business = factory(Business::class)->create([ 'user_id'=>$user->id ]);

        $response = $this->get(route('plans.create'));

        $response->assertStatus(200);
        $response->assertViewHas('page', 'plans.create-page');
    }

    public function test_Plans_EditRoute_Unauthorized()
    {
        $plan = factory(Plan::class)->create();

        $response = $this->get(route('plans.edit', $plan));

        $response->assertRedirect(route('login'));
    }

    public function test_Plans_AuthUserWithBusinessViewEditRoute_Status200()
    {
        $user = factory(User::class)->create();
        $this->actingAs($user);
        $business = factory(Business::class)->create([ 'user_id'=>$user->id ]);
        $plan = factory(Plan::class)->create();

        $response = $this->get(route('plans.edit', $plan));

        $response->assertStatus(200);
        $response->assertViewHas('page', 'plans.edit-page');
    }
}
