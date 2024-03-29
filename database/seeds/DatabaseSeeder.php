<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder {

 /**
  * Seed the application's database.
  *
  * @return void
  */
 public function run() {
  $this->call( UserSeeder::class );
  $this->call( BusinessSeeder::class );
  $this->call( VideoSeeder::class );
  $this->call( AdvSeeder::class );
  $this->call( PlanSeeder::class );
  $this->call( BouncerRolesSeeder::class );
  $this->call( BouncerUsersSeeder::class );
 }
}
