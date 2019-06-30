@if ( !Auth::user()->hasVerifiedEmail() )
<div class="my-4 p-2 border-2 border-transparent font-light">
 <p class="mb-4 font-medium">{{ __( 'We sent you an activation code' ) }}</p>
 <p>{{ __( 'Check your email and click on the link to verify your account.' ) }}</p>
</div>
@endif
