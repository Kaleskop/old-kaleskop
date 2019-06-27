<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Video;
use Storage;

class VideosController extends Controller {

 public function upload( Request $request ) {
  $this->validate( $request, [
   'uservideo' => [ 'required', 'file' ]
  ] );

  $video = $request->file( 'uservideo' );
  $business = $request->user()->business;
  $basepath = "{$business->folder}/videos";

  $path = $video->store( $basepath, 's3' );

  $model = [
   'name'    => $video->getClientOriginalName(),
   'storage' => 's3',
   'path'    => $path,
   'type'    => $video->getMimeType(),
   'size'    => $video->getSize()
  ];
  $video = $business->videos()->create( $model );

  return back();
 }

 public function destroy( Request $request, Video $video ) {
  Storage::disk( $video->storage )->delete( $video->path );
  $video->delete();

  return back();
 }
}
