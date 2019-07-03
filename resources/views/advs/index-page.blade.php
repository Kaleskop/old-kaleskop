@extends( 'layouts.page' )

@section( 'page' )
<section>
 <header>
  <h2>{{ __( 'Advertisements' ) }}</h2>

  <a href="{{ route( 'advs.create' ) }}">{{ __( 'New advertisement' ) }}</a>
 </header>

 <div>
  @forelse( $advs as $adv )
   @include( 'advs.tile' )

  @empty
   <p>{{ __( 'No advertisement' ) }}</p>

  @endforelse
 </div>
</section>

@endsection
