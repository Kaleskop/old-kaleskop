@if ( !Auth::user()->hasVerifiedEmail() )
<div>
 <p>{{ __( 'We sent you an activation code' ) }}</p>
 <p>{{ __( 'Check your email and click on the link to verify your account.' ) }}</p>
</div>
@endif
