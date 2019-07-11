<form method="POST" action="{{ route( 'register' ) }}">
 @csrf

 <fieldset>
  <legend>{{ __( 'Sign up' ) }}</legend>

  <div>
   <label for="name">{{ __( 'Name' ) }}</label>
   <input type="text" name="name" id="name" value="{{ old( 'name' ) }}" required autofocus />

   @if ( $errors->has( 'name' ) )
    <p>{{ $errors->first( 'name' ) }}</p>
   @endif
  </div>

  <div>
   <label for="email">{{ __( 'Email address' ) }}</label>
   <input type="email" name="email" id="email" required />

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
   <label for="password_confirmation">{{ __( 'Confirm password' ) }}</label>
   <input type="password" name="password_confirmation" id="password_confirmation" required />
  </div>
 </fieldset>

 <fieldset>
  <legend>{{ __( 'Terms & Conditions' ) }}</legend>

  <div>
   <input type="checkbox" name="terms" id="terms" value="true" />
   <label for="terms">{{ __( 'I agree with the' ) }} <a href="{{ route( 'terms.account' ) }}" target="_blank">{{ __( 'Terms of service' ) }}</a></label>

   @if ( $errors->has( 'terms' ) )
    <p>{{ $errors->first( 'terms' ) }}</p>
   @endif
  </div>
 </fieldset>

 <button type="submit">{{ __( 'Register' ) }}</button>
</form>
