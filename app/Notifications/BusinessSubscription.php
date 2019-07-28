<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

use App\Business;

class BusinessSubscription extends Notification {

 use Queueable;

 /**
  * The subscribed business
  */
 protected $business;

 /**
  * Create a new notification instance.
  *
  * @return void
  */
 public function __construct( Business $business ) {
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
   ->subject( '[Kaleskop] New Subscription')
   ->greeting( 'Hey guys!' )
   ->line( 'We have a new subscription.' );
 }

 /**
  * Get the array representation of the notification.
  *
  * @param mixed $notifiable
  * @return array
  */
 public function toArray( $notifiable ) {
  return [
   'id' => $this->business->id,
   'name' => $this->business->name
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
   'type' => 'subscribed',
   'id' => $this->business->id,
   'name' => $this->business->name,
   'message' => 'Company %s subscribed to a plan.'
  ];
 }
}
