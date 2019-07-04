<header>
 <h1><a href="{{ route( 'website.homepage' ) }}">{{ config( 'app.name' ) }}</a></h1>

 @guest
  <a href="{{ route( 'login' ) }}">
   <span></span>
   <span>{{ __( 'Login' ) }}</span>
  </a>
 @endguest

 <a href="{{ route( 'website.channels' ) }}">
  <span></span>
  <span>{{ __( 'Channels' ) }}</span>
 </a>
</header>
