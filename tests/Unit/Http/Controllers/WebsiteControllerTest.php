<?php

namespace Tests\Unit\Http\Controllers;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

use App\Adv;

class WebsiteControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_Website_HomepageRoute_Status200()
    {
        $response = $this->get(route('website.homepage'));

        $response->assertStatus(200);
        $response->assertViewIs('website.homepage');
    }

    public function test_Website_PricingRoute_Status200()
    {
        $response = $this->get(route('website.pricing'));

        $response->assertStatus(200);
        $response->assertViewIs('website.pricing');
    }

    public function test_Website_ChannelsRoute_Status200()
    {
        $response = $this->get(route('website.channels'));

        $response->assertStatus(200);
        $response->assertViewHas('page', 'website.channels-page');
    }

    public function test_Website_AdvsRoute_Status200()
    {
        $adv = factory(Adv::class)->create();

        $response = $this->get(route('website.advs', $adv));

        $response->assertStatus(200);
        $response->assertViewHas('page', 'website.advs-page');
    }

    public function test_Website_EndpointRoute_RedirectToAdvEndpoint()
    {
        $adv = factory(Adv::class)->create();

        $response = $this->get(route('website.endpoint', $adv));

        $response->assertRedirect($adv->endpoint);
    }
}
