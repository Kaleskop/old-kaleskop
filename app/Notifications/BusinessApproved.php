<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

use App\Business;

class BusinessApproved extends Notification {

 use Queueable;

 /**
  * The approved business
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
  $name = $this->business->name;

  return (new MailMessage)
   ->subject( '[Kaleskop] Company approved')
   ->greeting( "Welcome, {$name}!" )
   ->line( 'Your company has been approved on Kaleskop.com' )
   ->line( 'Now you can start advertising your products and services!' )
   ->line( 'Thank you for using our platform!' );
 }

 /**
  * Get the array representation of the notification.
  *
  * @param mixed $notifiable
  * @return array
  */
 public function toArray( $notifiable ) {
  return [
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
   'type' => 'approved',
   'name' => $this->business->name,
   'message' => 'Your company %s has been approved.'
  ];
 }
}
