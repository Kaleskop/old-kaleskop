<form method="POST" action="{{ route( 'password.email' ) }}">
 @csrf

 <fieldset>
  <legend>{{ __( 'Account details' ) }}</legend>

  <div>
   <label for="email">{{ __('E-Mail Address') }}</label>
   <input type="email" name="email" id="email" value="{{ old( 'email' ) }}" required />

   @if ($errors->has('email'))
    <p>{{ $errors->first('email') }}</p>
   @endif
  </div>
 </fieldset>

 <button type="submit">{{ __( 'Send Password Reset Link' ) }}</button>
</form>
