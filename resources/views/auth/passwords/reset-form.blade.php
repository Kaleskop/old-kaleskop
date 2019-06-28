<form method="POST" action="{{ route('password.update') }}">
 @csrf

 <fieldset>
  <legend>{{ __( 'Account details' ) }}</legend>

  <input type="hidden" name="token" value="{{ $token }}" />

  <div>
   <label for="email">{{ __( 'E-Mail Address' ) }}</label>
   <input type="email" name="email" id="email" value="{{ $email ?? old('email') }}" required autofocus />

   @if ( $errors->has( 'email' ) )
    <p>{{ $errors->first( 'email' ) }}</p>
   @endif
  </div>

  <div>
   <label for="password">{{ __( 'Password' ) }}</label>
   <input type="password" name="password" id="password" required />

   @if ( $errors->has( 'password' ) )
    <p>{{ $errors->first( 'password' ) }}</p>
   @endif
  </div>

  <div>
   <label for="password-confirm">{{ __( 'Confirm Password' ) }}</label>
   <input type="password" name="password_confirmation" id="password-confirm" required />
  </div>
 </fieldset>

 <button type="submit">{{ __( 'Reset Password' ) }}</button>
</form>
