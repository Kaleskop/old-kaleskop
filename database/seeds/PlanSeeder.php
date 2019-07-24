<?php

use Illuminate\Database\Seeder;

use App\Plan;

class PlanSeeder extends Seeder {

 /**
  * Run the database seeds.
  *
  * @return void
  */
 public function run() {
  // - standard
  factory( Plan::class )->create( [
   'product_id' => 'prod_F7VA2ugAWXZIhT',
   'product_name' => 'Storage',
   'plan_id' => 'plan_F7VBkOHU297sxU'
  ] );
  // - pro
  /*
  factory( Plan::class )->create( [
   'product_id' => 'prod_F7VA2ugAWXZIhT',
   'product_name' => 'Storage',
   'plan_id' => 'plan_FAtbGzr51Osl6K'
  ] );
  */
 }
}
