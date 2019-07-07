<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlansTable extends Migration {

 /**
  * Run the migrations.
  *
  * @return void
  */
 public function up() {
  Schema::create( 'plans', function( Blueprint $table ) {
   $table->bigIncrements( 'id' );
   $table->string( 'name' );
   $table->text( 'description' );
   $table->unsignedDecimal( 'price', 8, 2 );
   $table->text( 'product_id' );
   $table->text( 'product_name' );
   $table->text( 'plan_id' );
   $table->timestamps();
  } );
 }

 /**
  * Reverse the migrations.
  *
  * @return void
  */
 public function down() {
  Schema::dropIfExists( 'plans' );
 }
}
