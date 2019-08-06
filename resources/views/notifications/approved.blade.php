<div class="mb-4 px-2 flex justify-between items-center border-b border-black">
 <div class="flex">
  <span>{{ sprintf( $notification->data['message'], $notification->data['name'] ) }}</span>
  <span>{{ $notification->created_at->diffForHumans() }}</span>
 </div>

 @include( 'notifications.read-form' )

</div>
