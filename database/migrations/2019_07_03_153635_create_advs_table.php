<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdvsTable extends Migration {

 /**
  * Run the migrations.
  *
  * @return void
  */
 public function up() {
  Schema::create( 'advs', function( Blueprint $table ) {
   $table->bigIncrements('id');
   $table->unsignedInteger( 'business_id' )->index();
   $table->unsignedInteger( 'video_id' )->index();
   $table->string( 'title' );
   $table->string( 'endpoint' );
   $table->unsignedBigInteger( 'clicks' )->default(0);
   $table->timestamp( 'published_at' )->nullable();
   $table->timestamps();
   $table->softDeletes();
  } );
 }

 /**
  * Reverse the migrations.
  *
  * @return void
  */
 public function down() {
  Schema::dropIfExists( 'advs' );
 }
}
