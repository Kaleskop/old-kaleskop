<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBusinessesTable extends Migration {

 /**
  * Run the migrations.
  *
  * @return void
  */
 public function up() {
  Schema::create( 'businesses', function( Blueprint $table ) {
   $table->bigIncrements( 'id' );
   $table->unsignedInteger( 'user_id' )->index();
   $table->string( 'country' );
   $table->string( 'name' );
   $table->string( 'email' )->unique()->index();
   $table->string( 'vat' )->unique()->index();
   $table->string( 'address_line1' );
   $table->string( 'city' );
   $table->string( 'cap' );
   $table->string( 'folder' )->nullable();
   $table->timestamps();
  } );
 }

 /**
  * Reverse the migrations.
  *
  * @return void
  */
 public function down() {
  Schema::dropIfExists( 'businesses' );
 }
}
