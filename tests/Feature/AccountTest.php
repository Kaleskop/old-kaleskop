<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

use App\User;

class AccountTest extends TestCase {

 use RefreshDatabase;

 public function test_User_CanRegisterAnAccount_DatabaseHasUser() {
  $user = [
   'name' => 'Name',
   'email' => 'a@b.c',
   'password' => 'password',
   'password_confirmation' => 'password'
  ];

  $response = $this->post( route( 'register' ), $user );

  $this->assertDatabaseHas( 'users', [ 'email'=>$user['email'] ] );
  $response->assertRedirect( route( 'account.index' ) );
 }

 public function test_User_CanLoginIn_IsAuthenticated() {
  $user = factory( User::class )->create();

  $data = [ 'email'=>$user->email, 'password'=>'password' ];
  $response = $this->post( route( 'login' ), $data );

  $this->assertAuthenticatedAs( $user );
  $response->assertRedirect( route( 'account.index' ) );
 }

 public function test_AuthUser_CanLogOut_IsLoggedOut() {
  $user = factory( User::class )->create();
  $data = [ 'email'=>$user->email, 'password'=>'password' ];
  $this->post( route( 'login' ), $data );

  $response = $this->post( route( 'logout' ) );

  $this->assertGuest();
  $response->assertRedirect( route( 'website.homepage' ) );
 }
}
