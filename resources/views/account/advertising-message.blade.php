@if ( !Auth::user()->hasBusiness() )
<div>
 <p>{{ __( 'Start advertising your business.' ) }} <a href="{{ route( 'business.store' ) }}">{{ __( 'Get your first GB of free space.' ) }}</a></p>
</div>
@endif
