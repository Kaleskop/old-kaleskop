@extends( 'layouts.layout' )

@section( 'body' )
<header>
 <div>
  <nav>
   <h1><a href="{{ route( 'website.homepage' ) }}">{{ config( 'app.name' ) }}</a></h1>

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
  <p>{{ __( 'Pricing' ) }}</p>
  <p>{{ __( 'Advertise with Kaleskop is fast and simple.' ) }}</p>
  <p>{{ __( 'Get your 1st GB of free space with almost 17 minutes* of video playback.' )}}</p>

  <div>
   <div>
    <p>{{ __( 'Free' ) }}</p>
    <p>0<sup>€</sup></p>
    <p>{{ __( 'Per month' ) }}</p>
    <p>{{ __( 'Kaleskop for everybody' ) }}</p>

    <div>
     <ul>
      <li>{{ __( '1GB of free storage' ) }}</li>
      <li>{{ __( 'Unlimited amount of advertising' ) }}</li>
      <li>{{ __( 'Spot your business products' ) }}</li>
      <li>{{ __( 'Up to 17 minutes* of video playback' ) }}</li>
     </ul>
    </div>
   </div>

   <div>
    <p>{{ __( 'Standard' ) }}</p>
    <p>10,98<sup>€</sup></p>
    <p>{{ __( 'Per month' ) }}</p>
    <p>{{ __( '15GB Storage' ) }} - <small>{{ _( 'VAT included' ) }}</small></p>

    <div>
     <ul>
      <li>{{ __( '1GB of free storage' ) }}</li>
      <li>{{ __( 'Unlimited amount of advertising' ) }}</li>
      <li>{{ __( 'Spot your business products' ) }}</li>
      <li>{{ __( '15GB expanded storage' ) }}</li>
      <li>{{ __( 'Up to 4 hours* of video playback' ) }}</li>
     </ul>
    </div>
   </div>

   <div>
    <p><small>{{ __( '* - video playback time calculated on 60 seconds 1920x1080@25fps with H.264 encoding.' ) }} - <a href="https://www.dr-lex.be/info-stuff/videocalc.html" target="_blank">Learn more</a></small></p>
   </div>
  </div>
 </div>

 <div>
  <div>
   <a href="{{ route( 'register' ) }}">{{ __( 'Get Started For Free' ) }}</a>
  </div>
 </div>

 <div>
  <div>
   <p>{{ __( 'Enterprise Solution' ) }}</p>
   <p>{{ __( 'Need more? Speak directly with us to find a solution that best fits your business, on:' ) }} <a href="https://discord.gg/rcMk7M5" target="_blank">Discord</a></p>
  </div>
 </div>
</div>

@include( 'layouts.footer' )

@endsection
