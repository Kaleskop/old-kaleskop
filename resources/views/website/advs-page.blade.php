@extends( 'layouts.page' )

@section( 'page' )
<section>
 <div>
  <adv-player v-bind:adv="{{ $adv }}"></adv-player>

  <header class="p-2 flex justify-between items-center bg-black text-white">
   <h2 class="font-medium text-2xl">{{ $adv->title }}</h2>

   <a href="{{ route( 'website.endpoint', $adv ) }}" target="_blank">
    <span></span>
    <span>{{ __( 'Go to product page' ) }}</span>
   </a>
  </header>
 </div>

 <section class="py-16 px-6 flex justify-center items-center">
  <p>{{ __( 'Comments disabled for this content' ) }}</p>
 </section>
</section>

@endsection

@push( 'metadata' )
 @include( 'layouts.metadata', [ 'title'=>$adv->title ] )

@endpush
