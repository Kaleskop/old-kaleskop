@extends( 'layouts.layout' )

@section( 'body' )
 @include( 'website.header' )

<div>
 <div class="container mx-auto px-6">
  <div class="h-70-screen flex items-end">
   <div class="w-3/4 mx-auto text-center">
    <h2 class="font-semibold text-3xl">{{ __( 'Promote your products with ease' ) }}</h2>
    <p class="font-thin text-2xl">{{ __( 'Use your commercials to spread your products worldwide, drive people to your website, get more valuable customers' ) }}</p>
   </div>
  </div>
 </div>
</div>

<div>
 <div class="container mx-auto px-6">
  <div class="pt-32 pb-24">
   <div class="mb-4 text-center">
    <p class="font-semibold text-2xl">{{ __( 'Begin your funnel from valuable customers' ) }}</p>

    <div class="mt-8 py-8 md:flex md:justify-center md:items-center">
     <div class="w-full md:w/1/3 text-center">
      <div class="w-32 mx-auto mb-4">
       @include( 'svg.tv' )
      </div>

      <p class="mb-2 font-medium">{{ __( 'Sell your products as on TV' ) }}</p>
      <p>{{ __( 'Use your commercials as on TV but with an audience from all over the world in front of you')}}
     </div>

     <div class="w-full md:w/1/3 text-center">
      <div class="w-32 mx-auto mb-4">
       @include( 'svg.website' )
      </div>

      <p class="mb-2 font-medium">{{ __( 'Drive people to your web page' ) }}</p>
      <p>{{ __( 'Let people reach your web pages immediatly to find the best of your products')}}
     </div>

     <div class="w-full md:w/1/3 text-center">
      <div class="w-32 mx-auto mb-4">
       @include( 'svg.landing' )
      </div>

      <p class="mb-2 font-medium">{{ __( 'Reach persons interested in your brand' ) }}</p>
      <p>{{ __( 'Your funnel strategy begin with the most valuable persons who wants to buy your products')}}
     </div>
    </div>
   </div>
  </div>
 </div>
</div>

<div>
 <div class="container mx-auto px-6">
  <div class="py-24">
   <div class="mb-4 text-center">
    <p class="font-semibold text-2xl">{{ __( 'Spot Your Business With Kaleskop' ) }}</p>
   </div>

   <a href="{{ route( 'register' ) }}" class="cursor-pointer whitespace-nowrap block w-full md:w-1/2 md:mx-auto py-4 px-6 rounded tracking-wide font-medium text-center text-2xl shadow-md text-black bg-yellow-600">{{ __( 'Start Now For Free' ) }}</a>
  </div>
 </div>
</div>

 @include( 'layouts.footer' )

@endsection

@push( 'metadata' )
 @include( 'layouts.metadata' )

@endpush
