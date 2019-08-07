<form method="POST" action="{{ route( 'newsletters.subscribe' ) }}">
 @csrf

 <fieldset class="p-4">
  <legend class="hidden p-2 font-light italic">{{ __( 'Newsletter' ) }}</legend>

  <div class="flex flex-col md:flex-row justify-center items-center">
   <label for="email" class="font-bold">{{ __( 'Newsletter' ) }}</label>
   <input type="email" name="email" placeholder="Your email.." id="email" class="appearance-none mb-2 md:mb-0 md:mx-6 py-2 px-4 rounded border-2 border-black leading-tight" required />
   <button type="submit" class="select-none cursor-pointer inline-block white-space-no-wrap py-2 px-4 rounded border border-transparent leading-tight text-center bg-black text-white">{{ __( 'Subscribe' ) }}</button>
  </div>

  @if ( $errors->has( 'email' ) )
   <p>{{ $errors->first( 'email' ) }}</p>
  @endif
 </fieldset>
</form>
