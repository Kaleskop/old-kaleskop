<section class="my-4 p-2 border-2 border-black">
 <h3 class="mb-2 font-semibold text-xl">{{ __( 'Notifications' ) }}</h3>

 <div>
  @forelse( $subject->unreadNotifications as $notification )
   @include( 'notifications.'.$notification->data['type'] )

  @empty
   <p class="px-2">{{ __( 'All read..' ) }}</p>

  @endforelse
 </div>
</section>
