<header class="py-2 px-6 flex justify-between items-center">
 <h1 class="font-semibold text-2xl"><a href="{{ route( 'website.homepage' ) }}">{{ config( 'app.name' ) }}</a></h1>

 @guest
  <a href="{{ route( 'login' ) }}" class="sm:hidden">
   <span></span>
   <span>{{ __( 'Login' ) }}</span>
  </a>
 @endguest

 <a href="{{ route( 'website.channels' ) }}" class="sm:hidden">
  <span></span>
  <span>{{ __( 'Channels' ) }}</span>
 </a>
</header>
