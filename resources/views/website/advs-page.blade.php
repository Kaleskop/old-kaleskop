@extends( 'layouts.page' )

@section( 'page' )
<section>
 <div>
  <header>
   <h2>{{ $adv->title }}</h2>

   <a href="{{ route( 'website.endpoint', $adv ) }}" target="_blank">
    <span></span>
    <span>{{ __( 'Go to product page' ) }}</span>
   </a>
  </header>
 </div>

 <section>
  <p>{{ __( 'Comments disabled for this content' ) }}</p>
 </section>
</section>

@endsection
