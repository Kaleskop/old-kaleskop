<form method="POST" action="{{ route( 'business.store' ) }}">
 @csrf

 <fieldset>
  <legend>{{ __( 'Business details' ) }}</legend>

  <div>
   <label for="country">{{ __( 'Country' ) }}</label>
   <select name="country" id="country" required>
    @foreach( $countries as $iso=>$country )
     <option value="{{ $iso }}"{{ (old( 'country' ) === $iso) ? ' selected' : '' }}>{{ $country }}</option>

    @endforeach
   </select>

   @if ( $errors->has( 'country' ) )
    <p>{{ $errors->first( 'country' ) }}</p>
   @endif
  </div>

  <div>
   <label for="name">{{ __( 'Legal Name' ) }}</label>
   <input type="text" name="name" id="name" placeholder="My Company Ltd" value="{{ old( 'name' ) }}" required />

   @if ( $errors->has( 'name' ) )
    <p>{{ $errors->first( 'name' ) }}</p>
   @endif
  </div>

  <div>
   <label for="email">{{ __( 'Email' ) }}</label>
   <input type="email" name="email" id="email" placeholder="info@mycompany.com" value="{{ old( 'email' ) }}" required />

   @if ( $errors->has( 'email' ) )
    <p>{{ $errors->first( 'email' ) }}</p>
   @endif
  </div>

  <div>
   <label for="vat">{{ __( 'Vat number' ) }}</label>
   <input type="text" name="vat" id="vat" placeholder="IT123456789" value="{{ old( 'vat' ) }}" required />

   @if ( $errors->has( 'vat' ) )
    <p>{{ $errors->first( 'vat' ) }}</p>
   @endif
  </div>
 </fieldset>

 <fieldset>
  <legend>{{ __( 'Address details' ) }}</legend>

  <div>
   <label for="address_line1">{{ __( 'Address' ) }}</label>
   <input type="text" name="address_line1" id="address_line1" placeholder="Main address line" value="{{ old( 'address_line1' ) }}" required />

   @if ( $errors->has( 'address_line1' ) )
    <p>{{ $errors->first( 'address_line1' ) }}</p>
   @endif
  </div>

  <div>
   <label for="city">{{ __( 'City' ) }}</label>
   <input type="text" name="city" id="city" placeholder="City" value="{{ old( 'city' ) }}" required />

   @if ( $errors->has( 'city' ) )
    <p>{{ $errors->first( 'city' ) }}</p>
   @endif
  </div>

  <div>
   <label for="cap">{{ __( 'Postal Code' ) }}</label>
   <input type="text" name="cap" id="cap" placeholder="12345" value="{{ old( 'cap' ) }}" required />

   @if ( $errors->has( 'cap' ) )
    <p>{{ $errors->first( 'cap' ) }}</p>
   @endif
  </div>
 </fieldset>

 <fieldset>
  <legend>{{ __( 'Terms & Conditions' ) }}</legend>

  <div>
   <input type="checkbox" name="terms" id="terms" value="true" />
   <label for="terms">{{ __( 'I agree with the' ) }} <a href="" target="_blank">{{ __( 'Terms of service' ) }}</a></label>

   @if ( $errors->has( 'terms' ) )
    <p>{{ $errors->first( 'terms' ) }}</p>
   @endif
  </div>
 </fieldset>

 <button type="submit">{{ __( 'Register' ) }}</button>
</form>
