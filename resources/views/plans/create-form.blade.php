<form method="POST" action="{{ route( 'plans.store' ) }}">
 @csrf

 <fieldset>
  <legend>{{ __( 'Plan details' ) }}</legend>

  <div>
   <label for="name">{{ __( 'Name' ) }}</label>
   <input type="text" name="name" id="name" value="{{ old( 'name' ) }}" required autofocus />

   @if ( $errors->has( 'name' ) )
    <p>{{ $errors->first( 'name' ) }}</p>
   @endif
  </div>

  <div>
   <label for="description">{{ __( 'Description' ) }}</label>
   <textarea name="description" id="description">{{ old( 'description' ) }}</textarea>

   @if ( $errors->has( 'description' ) )
    <p>{{ $errors->first( 'description' ) }}</p>
   @endif

   <p><small><span></span> <a href="https://guides.github.com/features/mastering-markdown/" target="_blank">Style with Markdown</a></small></p>
  </div>

  <div>
   <label for="price">{{ __( 'Price' ) }}</label>
   <input type="number" min="0" step="0.01" name="price" id="price" value="{{ old( 'price' ) }}" required />

   @if ( $errors->has( 'price' ) )
    <p>{{ $errors->first( 'price' ) }}</p>
   @endif
  </div>
 </fieldset>

 <fieldset>
  <legend>{{ __( 'Plan details' ) }}</legend>

  <div>
   <label for="product_id">{{ __( 'Product id' ) }}</label>
   <input type="text" name="product_id" id="product_id" value="{{ old( 'product_id' ) }}" required />

   @if ( $errors->has( 'product_id' ) )
    <p>{{ $errors->first( 'product_id' ) }}</p>
   @endif
  </div>

  <div>
   <label for="product_name">{{ __( 'Product name' ) }}</label>
   <input type="text" name="product_name" id="product_name" value="{{ old( 'product_name' ) }}" required />

   @if ( $errors->has( 'product_name' ) )
    <p>{{ $errors->first( 'product_name' ) }}</p>
   @endif
  </div>

  <div>
   <label for="plan_id">{{ __( 'Plan id' ) }}</label>
   <input type="text" name="plan_id" id="plan_id" value="{{ old( 'plan_id' ) }}" required />

   @if ( $errors->has( 'plan_id' ) )
    <p>{{ $errors->first( 'plan_id' ) }}</p>
   @endif
  </div>
 </fieldset>

 <button type="submit">{{ __( 'Create' ) }}</button>
</form>
