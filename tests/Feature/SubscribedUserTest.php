<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

use App\User;
use App\Business;
use Storage;
use App\Plan;

class SubscribedUserTest extends TestCase
{
    use RefreshDatabase;

    protected $storage_product = [
        'product_id'=>'prod_F7VA2ugAWXZIhT', 'product_name'=>'Storage', 'plan_id'=>'plan_F7VBkOHU297sxU'
    ];
    protected $purchased_plan = [ 'plan'=>'plan_F7VBkOHU297sxU', 'stripeToken'=>'tok_visa' ];

    public function test_SubscribedUser_CanCancelSubscription_EndAt()
    {
        Storage::fake('s3');

        $user = factory(User::class)->create();
        $business = factory(Business::class)->create([ 'user_id'=>$user->id ]);
        $this->actingAs($user);
        $this->post(route('subscriptions.subscribe'), $this->purchased_plan);

        $plan = factory(Plan::class)->create($this->storage_product);
        $response = $this->delete(route('subscriptions.cancel', $plan));

        $this->assertNotNull($business->subscription($this->storage_product['product_name'])->ends_at);
    }
}
