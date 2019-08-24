<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

use App\User;
use App\Business;

class UserTest extends TestCase
{
    use RefreshDatabase;

    public function test_User_WithoutBusiness_HasBusinessFalse()
    {
        $user = factory(User::class)->create();

        $this->assertFalse($user->hasBusiness());
    }

    public function test_User_WithBusiness_HasBusinessTrue()
    {
        $user = factory(User::class)->create();
        $business = factory(Business::class)->create([ 'user_id'=>$user->id ]);

        $this->assertTrue($user->hasBusiness());
    }
}
