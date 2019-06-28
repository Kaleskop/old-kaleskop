@extends( 'layouts.layout' )

@section( 'body' )
<div>
 <div>
  @include( 'layouts.sidebar' )
 </div>

 <div>
  @include( $page )
 </div>
</div>

@endsection
