<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

use App\Video;
use App\Business;

class VideoUploaded extends Notification {

 use Queueable;

 /**
  * The business uploading the video
  */
 protected $business;

 /**
  * The video instance
  */
 protected $video;

 /**
  * Create a new notification instance.
  *
  * @return void
  */
 public function __construct( Video $video, Business $business ) {
  $this->video = $video;
  $this->business = $business;
 }
 
 /**
  * Get the notification's delivery channels.
  *
  * @param mixed $notifiable
  * @return array
  */
 public function via( $notifiable ) {
  return [ 'mail', 'database' ];
 }

 /**
  * Get the mail representation of the notification.
  *
  * @param mixed $notifiable
  * @return \Illuminate\Notifications\Messages\MailMessage
  */
 public function toMail( $notifiable ) {
  return (new MailMessage)
   ->subject( '[Kaleskop] New Video')
   ->greeting( 'Hey guys!' )
   ->line( 'We have a new video uploaded.' );
 }

 /**
  * Get the array representation of the notification.
  *
  * @param mixed $notifiable
  * @return array
  */
 public function toArray( $notifiable ) {
  return [
   'id' => $this->video->id,
   'business_id' => $this->business->id,
   'business_name' => $this->business->name
  ];
 }

 /**
  * Get the database representation of the notification.
  *
  * @param mixed $notifiable
  * @return array
  */
 public function toDatabase( $notifiable ) {
  return [
   'type' => 'uploaded',
   'id' => $this->video->id,
   'business_id' => $this->business->id,
   'business_name' => $this->business->name,
   'message' => 'New video [%d] uploaded by %s.'
  ];
 }
}
