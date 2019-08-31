<?php

namespace Tests\Unit\Http\Controllers;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

use App\User;
use App\Business;

class AccountControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_Account_IndexRoute_Unauthorized()
    {
        $response = $this->get(route('account.index'));

        $response->assertRedirect(route('login'));
    }

    public function test_Account_AuthUserViewIndexRoute_Status200()
    {
        $user = factory(User::class)->create();
        $this->actingAs($user);

        $response = $this->get(route('account.index'));

        $response->assertStatus(200);
        $response->assertViewHas('page', 'account.index-page');
    }

    public function test_Account_BusinessRoute_Unauthorized()
    {
        $response = $this->get(route('account.business'));

        $response->assertRedirect(route('login'));
    }

    public function test_Account_AuthUserViewBusinessRoute_Status200()
    {
        $user = factory(User::class)->create();
        $this->actingAs($user);

        $response = $this->get(route('account.business'));

        $response->assertStatus(200);
        $response->assertViewHas('page', 'account.business-page');
    }

    public function test_Account_AuthUserWithBusinessCannotViewBusinessRoute_Redirect()
    {
        $user = factory(User::class)->create();
        $business = factory(Business::class)->create([ 'user_id'=>$user->id ]);
        $this->actingAs($user);

        $response = $this->get(route('account.business'));

        $response->assertRedirect(route('business.index'));
    }
}
