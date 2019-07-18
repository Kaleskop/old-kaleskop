@extends( 'layouts.layout' )

@section( 'body' )
<header>
 <div class="container mx-auto px-6">
  <nav class="py-2 flex justify-between items-center">
   <h1 class="font-semibold text-2xl">{{ config( 'app.name' ) }}</h1>

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
  <div class="py-8">
   <p class="font-medium text-2xl text-center">{{ __( 'Kaleskop is the advertisement videos archives' ) }}</p>
  </div>

  <p class="mb-4 font-medium uppercase text-3xl text-center">{{ __( 'Spot your business' ) }}</p>

  <div class="py-8">
   <p class="mb-2 font-semibold text-2xl">{{ __( 'Promote your product with ease' ) }}</p>
   <p class="text-xl">{{ __( 'We are building a community with tons of features to let you reach as many people as you can.' ) }}</p>
  </div>

  <div class="py-8">
   <p><a href="{{ route( 'website.channels' ) }}" class="cursor-pointer whitespace-nowrap block w-full md:w-1/2 md:mx-auto py-4 px-6 rounded tracking-wide font-medium text-center text-2xl shadow-md">{{ __( 'Channels' ) }}</a></p>
  </div>

  <div class="py-8">
   <p class="mb-2 font-semibold text-2xl">{{ __( 'Get your 1st GB for free.' ) }}</p>
   <p class="text-xl">{{ __( 'We host a collection of advertisement videos of your business. Up to 17 minutes of free advertising time for your business with an unlimited number of advertisements for you.' ) }}</p>
  </div>
 </div>
</div>

<div>
 <div class="container mx-auto py-8 px-6">
  <p class="mb-4 leading-relaxed tracking-tight font-medium text-center text-3xl">Join the first advertisement community</p>
  <p><a href="{{ route( 'register' ) }}" class="cursor-pointer whitespace-nowrap block w-full md:w-1/2 md:mx-auto py-4 px-6 rounded tracking-wide font-medium text-center text-2xl shadow-md">{{ __( 'Get Started For Free' ) }}</a></p>
 </div>
</div>

 @include( 'layouts.footer' )

@endsection

@push( 'metadata' )
 @include( 'layouts.metadata' )

@endpush
