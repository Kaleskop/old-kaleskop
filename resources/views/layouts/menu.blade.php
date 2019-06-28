<nav>

 @guest
 <a href="{{ route( 'login' ) }}">
  <span></span>
  <span>{{ __( 'Login' ) }}</span>
 </a>
 @endguest

 @auth
 <a href="{{ route( 'account.index' ) }}">
  <span></span>
  <span>{{ __( 'Account' ) }}</span>
 </a>
 <a href="{{ route( 'business.index' ) }}">
  <span></span>
  <span>{{ __( 'Business' ) }}</span>
 </a>
 @endauth

 @business
 <a href="{{ route( 'videos.index' ) }}">
  <span></span>
  <span>{{ __( 'Videos' ) }}</span>
 </a>
 @endbusiness

</nav>
