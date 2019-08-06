<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

use App\User;

class UserRegistration extends Notification {

 use Queueable;

 /**
  * The registered user
  */
 protected $user;

 /**
  * Create a new notification instance.
  *
  * @return void
  */
 public function __construct( User $user ) {
  $this->user = $user;
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
   ->subject( '[Kaleskop] New User')
   ->greeting( 'Hey guys!' )
   ->line( 'We have a new user.' );
 }

 /**
  * Get the array representation of the notification.
  *
  * @param mixed $notifiable
  * @return array
  */
 public function toArray( $notifiable ) {
  return [
   'id' => $this->user->id,
   'name' => $this->user->name
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
   'type' => 'registered',
   'id' => $this->user->id,
   'name' => $this->user->name,
   'message' => 'User %s registered.'
  ];
 }
}
