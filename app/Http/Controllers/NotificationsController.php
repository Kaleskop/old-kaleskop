<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Notifications\DatabaseNotification;

class NotificationsController extends Controller {

 public function read( Request $request, DatabaseNotification $notification ) {
  $notification->markAsRead();

  if ( $request->wantsJson() ) {
   return $notification;
  }

  return back();
 }
}
