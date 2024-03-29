<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

use App\Video;

class BlogController extends Controller {


 // - view actions

 public function theintro() {
  $intro = Video::make( [
   'storage' => 's3',
   'path' => asset( 'resources/videos/intro.mp4' ),
   'type' => 'video/mp4'
  ] );

  return view( 'layouts.wrapper', [ 'page'=>'blog.the-intro' ] )
   ->with( 'intro', $intro );
 }

 public function collection() {
  return view( 'layouts.wrapper', [ 'page'=>'blog.collection' ] );
 }
}
