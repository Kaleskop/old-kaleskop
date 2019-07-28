<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateModerationsTable extends Migration {

 /**
  * Run the migrations.
  *
  * @return void
  */
 public function up() {
  Schema::create( 'moderations', function( Blueprint $table ) {
   $table->bigIncrements('id');
   $table->unsignedInteger( 'user_id' )->index();
   $table->morphs( 'model' );
   $table->string( 'status' );
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
  Schema::dropIfExists( 'moderations' );
 }
}
