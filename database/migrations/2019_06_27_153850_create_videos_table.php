<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVideosTable extends Migration {

 /**
  * Run the migrations.
  *
  * @return void
  */
 public function up() {
  Schema::create( 'videos', function( Blueprint $table ) {
   $table->bigIncrements('id');
   $table->unsignedInteger( 'business_id' )->index();
   $table->string( 'name' );
   $table->string( 'type' );
   $table->string( 'storage' );
   $table->string( 'path' );
   $table->unsignedInteger( 'size' )->default(0);
   $table->timestamps();
  } );
 }

 /**
  * Reverse the migrations.
  *
  * @return void
  */
 public function down() {
  Schema::dropIfExists( 'videos' );
 }
}
