<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

use App\User;
use Storage;
use App\Business;

class AuthUserTest extends TestCase
{
    use RefreshDatabase;

    public function test_AuthUser_CanLogoutFromAccount_IsLoggedOut()
    {
        $user = factory(User::class)->create();
        $data = [ 'email'=>$user->email, 'password'=>'password' ];
        $this->post(route('login'), $data);

        $response = $this->post(route('logout'));

        $response->assertRedirect(route('website.homepage'));
        $this->assertGuest();
    }

    public function test_AuthUser_CanRegisterABusiness_HasBusiness()
    {
        Storage::fake('s3');

        $user = factory(User::class)->create();
        $this->actingAs($user);

        $business = factory(Business::class)->make([ 'terms'=>'true' ]);
        $response = $this->post(route('business.store'), $business->toArray());

        $response->assertRedirect(route('business.index'));
        $this->assertDatabaseHas('businesses', [ 'email'=>$business->email, 'vat'=>$business->vat ]);
    }
}
