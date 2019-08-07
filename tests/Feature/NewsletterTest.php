<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class NewsletterTest extends TestCase {

 use RefreshDatabase;

 public function test_User_CanSubscribeToReceiveNewsletters_HasNewsletter() {
  $data =  [ 'email' => 'a@b.com' ];

  $response = $this->post( route( 'newsletters.subscribe' ), $data );

  $this->assertDatabaseHas( 'newsletters', [ 'email'=>$data['email'] ] );
 }
}
