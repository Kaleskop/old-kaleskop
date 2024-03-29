<form method="POST" action="{{ route('password.update') }}">
 @csrf

 <fieldset class="mb-8 p-4 border border-black">
  <legend class="p-2 font-light italic">{{ __( 'Account details' ) }}</legend>

  <input type="hidden" name="token" value="{{ $token }}" />

  <div class="mb-4">
   <label for="email" class="block mb-2 font-bold">{{ __( 'E-Mail Address' ) }}</label>
   <input type="email" name="email" id="email" class="appearance-none w-full py-2 px-4 rounded border-2 border-black leading-tight" value="{{ $email ?? old('email') }}" required autofocus />

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
   <label for="password-confirm" class="block mb-2 font-bold">{{ __( 'Confirm Password' ) }}</label>
   <input type="password" name="password_confirmation" id="password-confirm" class="appearance-none w-full py-2 px-4 rounded border-2 border-black leading-tight" required />
  </div>
 </fieldset>

 <button type="submit" class="select-none cursor-pointer inline-block white-space-no-wrap py-2 px-4 rounded border border-transparent leading-tight text-center bg-black text-white">{{ __( 'Reset Password' ) }}</button>
</form>
