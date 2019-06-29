<form method="POST" action="{{ route( 'login' ) }}">
 @csrf

 <fieldset class="mb-8 p-4 border border-transparent">
  <legend class="p-2 font-light italic">{{ __( 'Login' ) }}</legend>

  <div class="mb-4">
   <label for="email" class="block mb-2 font-bold">{{ __( 'Email address' ) }}</label>
   <input type="email" name="email" id="email" class="appearance-none w-full py-2 px-4 rounded border-2 border-transparent leading-tight" required />

   @if ( $errors->has( 'email' ) )
    <p>{{ $errors->first( 'email' ) }}</p>
   @endif
  </div>

  <div class="mb-4">
   <label for="password" class="block mb-2 font-bold">{{ __( 'Password' ) }}</label>
   <input type="password" name="password" id="password" class="appearance-none w-full py-2 px-4 rounded border-2 border-transparent leading-tight" required />

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

 <button type="submit" class="select-none cursor-pointer inline-block white-space-no-wrap py-2 px-4 rounded border border-transparent leading-tight text-center">{{ __( 'Login' ) }}</button>
</form>
