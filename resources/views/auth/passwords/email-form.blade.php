<form method="POST" action="{{ route( 'password.email' ) }}">
 @csrf

 <fieldset class="mb-8 p-4 border border-transparent">
  <legend class="p-2 font-light italic">{{ __( 'Account details' ) }}</legend>

  <div>
   <label for="email" class="block mb-2 font-bold">{{ __('E-Mail Address') }}</label>
   <input type="email" name="email" id="email" class="appearance-none w-full py-2 px-4 rounded border-2 border-transparent leading-tight" value="{{ old( 'email' ) }}" required />

   @if ($errors->has('email'))
    <p>{{ $errors->first('email') }}</p>
   @endif
  </div>
 </fieldset>

 <button type="submit" class="select-none cursor-pointer inline-block white-space-no-wrap py-2 px-4 rounded border border-transparent leading-tight text-center">{{ __( 'Send Password Reset Link' ) }}</button>
</form>
