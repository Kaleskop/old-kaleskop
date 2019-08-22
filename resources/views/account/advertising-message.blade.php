@if ( !Auth::user()->hasBusiness() )
<div class="my-4 p-2 border-2 border-black font-light">
 <p>{{ __( 'Start advertising your business.' ) }} <a href="{{ route( 'business.store' ) }}" class="underline">{{ __( 'Get your 500Mb of free space.' ) }}</a></p>
</div>
@endif
