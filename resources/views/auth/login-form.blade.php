<form method="POST" action="{{ route( 'login' ) }}">
 @csrf

 <fieldset>
  <legend>{{ __( 'Login' ) }}</legend>

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
   <div>
    <input type="checkbox" name="remember" id="remember" value="true" />
    <label for="remember">{{ __( 'Remember me' ) }}</label>
   </div>

   @if ( $errors->has( 'remember' ) )
    <p>{{ $errors->first( 'remember' ) }}</p>
   @endif
  </div>
 </fieldset>

 <button type="submit">{{ __( 'Login' ) }}</button>
</form>
