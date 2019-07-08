<form method="POST" action="{{ route( 'register' ) }}">
 @csrf

 <fieldset class="mb-8 p-4 border border-black">
  <legend class="p-2 font-light italic">{{ __( 'Sign up' ) }}</legend>

  <div class="mb-4">
   <label for="name" class="block mb-2 font-bold">{{ __( 'Name' ) }}</label>
   <input type="text" name="name" id="name" class="appearance-none w-full py-2 px-4 rounded border-2 border-black leading-tight" value="{{ old( 'name' ) }}" required autofocus />

   @if ( $errors->has( 'name' ) )
    <p>{{ $errors->first( 'name' ) }}</p>
   @endif
  </div>

  <div class="mb-4">
   <label for="email" class="block mb-2 font-bold">{{ __( 'Email address' ) }}</label>
   <input type="email" name="email" id="email" class="appearance-none w-full py-2 px-4 rounded border-2 border-black leading-tight" required />

   @if ( $errors->has( 'email' ) )
    <p>{{ $errors->first( 'email' ) }}</p>
   @endif
  </div>

  <div class="mb-4">
   <label for="password" class="block mb-2 font-bold">{{ __( 'Password' ) }}</label>
   <input type="password" name="password" id="password" class="appearance-none w-full py-2 px-4 rounded border-2 border-black leading-tight" required />

   @if ( $errors->has( 'password' ) )
    <p>{{ $errors->first( 'password' ) }}</p>
   @endif
  </div>

  <div>
   <label for="password_confirmation" class="block mb-2 font-bold">{{ __( 'Confirm password' ) }}</label>
   <input type="password" name="password_confirmation" id="password_confirmation" class="appearance-none w-full py-2 px-4 rounded border-2 border-black leading-tight" required />
  </div>
 </fieldset>

 <fieldset class="mb-8 p-4 border border-black">
  <legend class="p-2 font-light italic">{{ __( 'Terms & Conditions' ) }}</legend>

  <div>
   <input type="checkbox" name="terms" id="terms" value="true" />
   <label for="terms">{{ __( 'I agree with the' ) }} <a href="{{ route( 'terms.account' ) }}" class="underline" target="_blank">{{ __( 'Terms of service' ) }}</a></label>

   @if ( $errors->has( 'terms' ) )
    <p>{{ $errors->first( 'terms' ) }}</p>
   @endif
  </div>
 </fieldset>

 <button type="submit" class="select-none cursor-pointer inline-block white-space-no-wrap py-2 px-4 rounded border border-transparent leading-tight text-center bg-black text-white">{{ __( 'Register' ) }}</button>
</form>
