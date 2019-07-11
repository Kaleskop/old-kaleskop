@extends( 'layouts.layout' )

@section( 'body' )
<header>
 <div class="container mx-auto px-6">
  <nav class="py-2 flex justify-between items-center">
   <h1 class="font-semibold text-2xl"><a href="{{ route( 'website.homepage' ) }}">{{ config( 'app.name' ) }}</a></h1>

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
 <div class="container mx-auto py-16 px-6">
  <p class="mb-4 font-medium uppercase text-xl text-center">{{ __( 'Pricing' ) }}</p>
  <p class="font-medium text-xl text-center">{{ __( 'Advertise with Kaleskop is fast and simple.' ) }}</p>
  <p class="text-center">{{ __( 'Get your 1st GB of free space with almost 17 minutes* of video playback.' )}}</p>

  <div class="mt-16 mb-8 flex flex-col flex-wrap md:flex-row">
   <div class="mb-6 p-4 w-full md:w-1/2 text-center">
    <p class="font-semibold text-2xl">{{ __( 'Free' ) }}</p>
    <p class="py-3 font-semibold text-4xl">0<sup>€</sup></p>
    <p class="font-bold">{{ __( 'Per month' ) }}</p>
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

   <div class="mb-6 p-4 w-full md:w-1/2 text-center shadow-lg">
    <p class="font-semibold text-2xl">{{ __( 'Standard' ) }}</p>
    <p class="py-3 font-semibold text-4xl">10,98<sup>€</sup></p>
    <p class="font-bold">{{ __( 'Per month' ) }}</p>
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

   <div class="w-full text-center">
    <p><small>{{ __( '* - video playback time calculated on 60 seconds 1920x1080@25fps with H.264 encoding.' ) }} - <a href="https://www.dr-lex.be/info-stuff/videocalc.html" target="_blank">Learn more</a></small></p>
   </div>
  </div>
 </div>

 <div>
  <div class="container mx-auto py-8 px-6">
   <a href="{{ route( 'register' ) }}" class="cursor-pointer whitespace-nowrap block w-full md:w-1/2 md:mx-auto py-4 px-6 rounded tracking-wide font-medium text-center text-2xl shadow-md">{{ __( 'Get Started For Free' ) }}</a>
  </div>
 </div>

 <div>
  <div class="container mx-auto py-8 px-6">
   <p class="mb-4 font-semibold text-2xl">{{ __( 'Enterprise Solution' ) }}</p>
   <p>{{ __( 'Need more? Speak directly with us to find a solution that best fits your business, on:' ) }} <a href="https://discord.gg/rcMk7M5" target="_blank" class="underline">Discord</a></p>
  </div>
 </div>
</div>

@include( 'layouts.footer' )

@endsection
