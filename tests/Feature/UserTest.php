<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

use App\User;

class UserTest extends TestCase
{
    use RefreshDatabase;

    public function test_User_CanLoginOnAccount_IsAuthenticated()
    {
        $user = factory(User::class)->create();
        $data = [ 'email'=>$user->email, 'password'=>'password' ];

        $response = $this->post(route('login'), $data);

        $response->assertRedirect(route('account.index'));
        $this->assertAuthenticatedAs( $user );
    }
}
