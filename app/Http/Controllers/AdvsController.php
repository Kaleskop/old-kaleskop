<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Adv;
use Auth;

class AdvsController extends Controller {

 public function __construct() {
  $this->middleware( 'auth' );
  $this->middleware( 'verified' );
  $this->middleware( 'business' );
 }

    public function store(Request $request)
    {
        $this->validate( $request, [
            'video_id'=>[ 'required' ],
            'title'=>[ 'required', 'string', 'max:255' ],
            'endpoint'=>[ 'required', 'string', 'max:255' ],
            'userimage'=>[ 'required', 'image' ],
        ]);

        $business = $request->user()->business;
        $cover = $request->file('userimage');
        $path = $cover->store($business->getFolderPath('images'), 's3');

        $model = [
            'video_id'=>$request->input('video_id'),
            'title'=>$request->input('title'),
            'endpoint'=>$request->input('endpoint'),
            'cover_path'=>$path
        ];
        $adv = $business->advs()->create($model);

        return redirect()->route('advs.index');
    }

 public function destroy( Adv $adv ) {
  $adv->delete();

  return back();
 }

 public function publish( Request $request, Adv $adv ) {
  $adv = $adv->publish();

  if ( $request->wantsJson() ) {
   return $adv;
  }

  return back();
 }

 public function unpublish( Request $request, Adv $adv ) {
  $adv = $adv->unpublish();

  if ( $request->wantsJson() ) {
   return $adv;
  }

  return back();
 }

    public function upload(Request $request)
    {
        $this->validate($request, [
            'userimage'=>[ 'required', 'image' ]
        ]);

        $image = $request->file('userimage');
        $business = $request->user()->business;

        $path = $image->store($business->getFolderPath('images'), 's3');

        if ($request->wantsJson()) {
            return response()->json([ 'path'=>$path ]);
        }

        return back();
    }

 // - view actions

 public function index() {
  $advs = Auth::user()->business->advs;

  return view( 'layouts.wrapper', [ 'page'=>'advs.index-page' ] )
   ->with( 'advs', $advs );
 }

 public function create() {
  $videos = Auth::user()->business->videos;

  return view( 'layouts.wrapper', [ 'page'=>'advs.create-page' ] )
   ->with( 'videos', $videos );
 }
}
