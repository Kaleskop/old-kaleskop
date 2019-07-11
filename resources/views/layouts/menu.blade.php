<nav class="py-4 flex justify-around sm:flex-col sm:items-center">

<a href="{{ route( 'website.channels' ) }}" class="hidden sm:inline-flex sm:mb-8">
  <span></span>
  <span>{{ __( 'Channels' ) }}</span>
 </a>

 @guest
 <a href="{{ route( 'login' ) }}" class="hidden sm:inline-flex sm:mb-4">
  <span></span>
  <span>{{ __( 'Login' ) }}</span>
 </a>
 @endguest

 @auth
 <a href="{{ route( 'account.index' ) }}" class="inline-flex sm:mb-4">
  <span></span>
  <span>{{ __( 'Account' ) }}</span>
 </a>
 <a href="{{ route( 'business.index' ) }}" class="inline-flex sm:mb-4">
  <span></span>
  <span>{{ __( 'Business' ) }}</span>
 </a>
 @endauth

 @business
 <a href="{{ route( 'videos.index' ) }}" class="inline-flex sm:mb-4">
  <span></span>
  <span>{{ __( 'Videos' ) }}</span>
 </a>
 <a href="{{ route( 'advs.index' ) }}" class="inline-flex sm:mb-4">
  <span></span>
  <span>{{ __( 'Advertisements' ) }}</span>
 </a>
 @endbusiness

</nav>
