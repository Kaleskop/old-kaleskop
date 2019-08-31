<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

use App\User;

class GuestTest extends TestCase
{
    use RefreshDatabase;

    public function test_Guest_CanRegisterAnAccount_HasUser()
    {
        $user = [
            'name'=>'Name',
            'email'=>'fake@name.com',
            'password'=>'password',
            'password_confirmation'=>'password',
            'terms'=>'true'
        ];

        $response = $this->post(route('register'), $user);

        $response->assertRedirect(route('account.index'));
        $this->assertDatabaseHas('users', [ 'email'=>$user['email'] ]);
    }

    public function test_Guest_CannotRegisterAnAccountWithoutTerms_Redirect()
    {
        $user = [
            'name'=>'Name',
            'email'=>'fake@name.com',
            'password'=>'password',
            'password_confirmation'=>'password'
        ];

        $response = $this->from(route('register'))->post(route('register'), $user);

        $response->assertRedirect(route('register'));
        $this->assertDatabaseMissing('users', [ 'email'=>$user['email'] ]);
    }
}
