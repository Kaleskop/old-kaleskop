<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

use App\Business;
use App\User;
use Storage;
use Illuminate\Http\UploadedFile;

class VideoTest extends TestCase {

 use RefreshDatabase;

 public function test_BusinessUser_CanUploadVideos_FileExists() {
  Storage::fake( 's3' );

  $user = factory( User::class )->create();
  $this->actingAs( $user );
  $business = factory( Business::class )->create( [ 'user_id'=>$user->id ] );

  $file = UploadedFile::fake()->create( 'fakevideo.mp4', 15200 );
  $response = $this->post( route( 'videos.upload' ), [ 'uservideo'=>$file ] );

  Storage::disk( 's3' )->assertExists( "{$business->folder}/videos/{$file->hashName()}" );
  $response->assertRedirect( route( 'videos.index' ) );
 }

 public function test_BusinessUser_CanDeleteUploadedVideos_FileMissing() {
  Storage::fake( 's3' );

  $user = factory( User::class )->create();
  $this->actingAs( $user );
  $business = factory( Business::class )->create( [ 'user_id'=>$user->id ] );
  $file = UploadedFile::fake()->create( 'fakevideo.mp4', 15200 );
  $this->post( route( 'videos.upload' ), [ 'uservideo'=>$file ] );

  $video = $user->business->videos()->first();
  $response = $this->delete( route( 'videos.destroy', $video ) );

  Storage::disk( 's3' )->assertMissing( $video->path );
 }

 public function test_BusinessUser_CanUploadOnlyUpTo1GB_RedirectToSubscription() {
  Storage::fake( 's3' );

  $user = factory( User::class )->create();
  $this->actingAs( $user );
  $business = factory( Business::class )->create( [ 'user_id'=>$user->id ] );
  $file1 = UploadedFile::fake()->create( 'fakevideo.mp4', 3000000 );
  $this->post( route( 'videos.upload' ), [ 'uservideo'=>$file1 ] );
  $file2 = UploadedFile::fake()->create( 'fakevideo.mp4', 3200000 );
  $this->post( route( 'videos.upload' ), [ 'uservideo'=>$file2 ] );
  $file3 = UploadedFile::fake()->create( 'fakevideo.mp4', 3000000 );
  $this->post( route( 'videos.upload' ), [ 'uservideo'=>$file3 ] );

  $file = UploadedFile::fake()->create( 'fakevideo.mp4', 3000000 );
  $response = $this->post( route( 'videos.upload' ), [ 'uservideo'=>$file ] );

  $response->assertRedirect( route( 'business.subscriptions' ) );
 }
}
