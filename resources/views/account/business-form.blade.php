<form method="POST" action="{{ route( 'business.store' ) }}">
 @csrf

 <fieldset class="mb-8 p-4 border border-black">
  <legend class="p-2 font-light italic">{{ __( 'Business details' ) }}</legend>

  <div class="mb-4">
   <label for="country" class="block mb-2 font-bold">{{ __( 'Country' ) }}</label>
   <select name="country" id="country" class="appearance-none outline-none cursor-pointer block w-full py-2 px-4 rounded border-2 border-transparent leading-tight bg-black text-white" required>
    @foreach( $countries as $iso=>$country )
     <option value="{{ $iso }}"{{ (old( 'country' ) === $iso) ? ' selected' : '' }}>{{ $country }}</option>

    @endforeach
   </select>

   @if ( $errors->has( 'country' ) )
    <p>{{ $errors->first( 'country' ) }}</p>
   @endif
  </div>

  <div class="mb-4">
   <label for="name" class="block mb-2 font-bold">{{ __( 'Legal Name' ) }}</label>
   <input type="text" name="name" id="name" class="appearance-none w-full py-2 px-4 rounded border-2 border-black leading-tight" placeholder="My Company Ltd" value="{{ old( 'name' ) }}" required />

   @if ( $errors->has( 'name' ) )
    <p>{{ $errors->first( 'name' ) }}</p>
   @endif
  </div>

  <div class="mb-4">
   <label for="email" class="block mb-2 font-bold">{{ __( 'Email' ) }}</label>
   <input type="email" name="email" id="email" class="appearance-none w-full py-2 px-4 rounded border-2 border-black leading-tight" placeholder="info@mycompany.com" value="{{ old( 'email' ) }}" required />

   @if ( $errors->has( 'email' ) )
    <p>{{ $errors->first( 'email' ) }}</p>
   @endif
  </div>

  <div>
   <label for="vat" class="block mb-2 font-bold">{{ __( 'Vat number' ) }}</label>
   <input type="text" name="vat" id="vat" class="appearance-none w-full py-2 px-4 rounded border-2 border-black leading-tight" placeholder="IT123456789" value="{{ old( 'vat' ) }}" required />

   @if ( $errors->has( 'vat' ) )
    <p>{{ $errors->first( 'vat' ) }}</p>
   @endif
  </div>
 </fieldset>

 <fieldset class="mb-8 p-4 border border-black">
  <legend class="p-2 font-light italic">{{ __( 'Address details' ) }}</legend>

  <div class="mb-4">
   <label for="address_line1" class="block mb-2 font-bold">{{ __( 'Address' ) }}</label>
   <input type="text" name="address_line1" id="address_line1" class="appearance-none w-full py-2 px-4 rounded border-2 border-black leading-tight" placeholder="Main address line" value="{{ old( 'address_line1' ) }}" required />

   @if ( $errors->has( 'address_line1' ) )
    <p>{{ $errors->first( 'address_line1' ) }}</p>
   @endif
  </div>

  <div class="mb-4">
   <label for="city" class="block mb-2 font-bold">{{ __( 'City' ) }}</label>
   <input type="text" name="city" id="city" class="appearance-none w-full py-2 px-4 rounded border-2 border-black leading-tight" placeholder="City" value="{{ old( 'city' ) }}" required />

   @if ( $errors->has( 'city' ) )
    <p>{{ $errors->first( 'city' ) }}</p>
   @endif
  </div>

  <div>
   <label for="cap" class="block mb-2 font-bold">{{ __( 'Postal Code' ) }}</label>
   <input type="text" name="cap" id="cap" class="appearance-none w-full py-2 px-4 rounded border-2 border-black leading-tight" placeholder="12345" value="{{ old( 'cap' ) }}" required />

   @if ( $errors->has( 'cap' ) )
    <p>{{ $errors->first( 'cap' ) }}</p>
   @endif
  </div>
 </fieldset>

 <fieldset class="mb-8 p-4 border border-black">
  <legend class="p-2 font-light italic">{{ __( 'Terms & Conditions' ) }}</legend>

  <div>
   <input type="checkbox" name="terms" id="terms" value="true" />
   <label for="terms">{{ __( 'I agree with the' ) }} <a href="{{ route( 'terms.business' ) }}" class="underline" target="_blank">{{ __( 'Terms of service' ) }}</a></label>

   @if ( $errors->has( 'terms' ) )
    <p>{{ $errors->first( 'terms' ) }}</p>
   @endif
  </div>
 </fieldset>

 <button type="submit" class="select-none cursor-pointer inline-block white-space-no-wrap py-2 px-4 rounded border border-transparent leading-tight text-center bg-black text-white">{{ __( 'Register' ) }}</button>
</form>
