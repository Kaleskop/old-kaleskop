@extends( 'layouts.layout' )

@section( 'body' )
<header>
 <div>
  <nav>
   <h1>{{ config( 'app.name' ) }}</h1>

   <div>
    <a href="{{ route( 'account.index' ) }}">
     <span></span>
     <span>{{ __( 'Account' ) }}</span>
    </a>

    <a href="{{ route( 'website.channels' ) }}">
     <span></span>
     <span>{{ __( 'Channels' ) }}</span>
    </a>
   </div>
  </nav>
 </div>
</header>

<div>
 <div>
  <p>{{ __( 'Spot your business' ) }}</p>

  <div>
   <p>{{ __( 'Promote your product with ease' ) }}</p>
   <p>{{ __( 'We are building a community with tons of features to let you reach as many people as you can.' ) }}</p>
  </div>

  <div>
   <p><a href="{{ route( 'website.channels' ) }}">{{ __( 'Channels' ) }}</a></p>
  </div>

  <div>
   <p>{{ __( 'Get your 1st GB for free.' ) }}</p>
   <p>{{ __( 'We host a collection of advertisement videos of your business. Up to 30 minutes of free advertising time for your business with an unlimited number of advertisements for you.' ) }}</p>
  </div>
 </div>
</div>

<div>
 <div>
  <p>Join the first advertisement community</p>
  <p><a href="{{ route( 'register' ) }}">{{ __( 'Get Started For Free' ) }}</a></p>
 </div>
</div>

 @include( 'layouts.footer' )

@endsection
