<?php

namespace Tests\Unit\Http\Controllers;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

use App\User;

class TermsControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_Terms_GeneralRoute_Status200()
    {
        $response = $this->get(route('terms.general'));

        $response->assertStatus(200);
        $response->assertViewHas('page', 'terms.general');
    }

    public function test_Terms_AccountRoute_Status200()
    {
        $response = $this->get(route('terms.account'));

        $response->assertStatus(200);
        $response->assertViewHas('page', 'terms.account');
    }

    public function test_Terms_BusinessRoute_Unauthorized()
    {
        $response = $this->get(route('terms.business'));

        $response->assertRedirect(route('login'));
    }

    public function test_Terms_AuthUserViewBusinessRoute_Status200()
    {
        $user = factory(User::class)->create();
        $this->actingAs($user);

        $response = $this->get(route('terms.business'));

        $response->assertStatus(200);
        $response->assertViewHas('page', 'terms.business');
    }
}
