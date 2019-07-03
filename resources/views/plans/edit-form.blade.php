<form method="POST" action="{{ route( 'plans.update', $plan ) }}">
 @csrf
 @method('PATCH')

 <fieldset class="mb-8 p-4 border border-transparent">
  <legend class="p-2 font-light italic">{{ __( 'Plan details' ) }}</legend>

  <div class="mb-4">
   <label for="name" class="block mb-2 font-bold">{{ __( 'Name' ) }}</label>
   <input type="text" name="name" id="name" class="appearance-none w-full py-2 px-4 rounded border-2 border-transparent leading-tight" value="{{ $plan->name }}" required autofocus />

   @if ( $errors->has( 'name' ) )
    <p>{{ $errors->first( 'name' ) }}</p>
   @endif
  </div>

  <div class="mb-4">
   <label for="description" class="block mb-2 font-bold">{{ __( 'Description' ) }}</label>
   <textarea name="description" id="description">{{ $plan->description }}</textarea>

   @if ( $errors->has( 'description' ) )
    <p>{{ $errors->first( 'description' ) }}</p>
   @endif

   <p class="mt-2"><small><span></span> <a href="https://guides.github.com/features/mastering-markdown/" class="underline" target="_blank">Style with Markdown</a></small></p>
  </div>

  <div>
   <label for="price" class="block mb-2 font-bold">{{ __( 'Price' ) }}</label>
   <input type="number" min="0" step="0.01" name="price" id="price" value="{{ $plan->price }}" required />

   @if ( $errors->has( 'price' ) )
    <p>{{ $errors->first( 'price' ) }}</p>
   @endif
  </div>
 </fieldset>

 <fieldset class="mb-8 p-4 border border-transparent">
  <legend class="p-2 font-light italic">{{ __( 'Plan details' ) }}</legend>

  <div class="mb-4">
   <label for="product_id" class="block mb-2 font-bold">{{ __( 'Product id' ) }}</label>
   <input type="text" name="product_id" id="product_id" class="appearance-none w-full py-2 px-4 rounded border-2 border-transparent leading-tight" value="{{ $plan->product_id }}" required />

   @if ( $errors->has( 'product_id' ) )
    <p>{{ $errors->first( 'product_id' ) }}</p>
   @endif
  </div>

  <div class="mb-4">
   <label for="product_name" class="block mb-2 font-bold">{{ __( 'Product name' ) }}</label>
   <input type="text" name="product_name" id="product_name" class="appearance-none w-full py-2 px-4 rounded border-2 border-transparent leading-tight" value="{{ $plan->product_name }}" required />

   @if ( $errors->has( 'product_name' ) )
    <p>{{ $errors->first( 'product_name' ) }}</p>
   @endif
  </div>

  <div>
   <label for="plan_id" class="block mb-2 font-bold">{{ __( 'Plan id' ) }}</label>
   <input type="text" name="plan_id" id="plan_id" class="appearance-none w-full py-2 px-4 rounded border-2 border-transparent leading-tight" value="{{ $plan->plan_id }}" required />

   @if ( $errors->has( 'plan_id' ) )
    <p>{{ $errors->first( 'plan_id' ) }}</p>
   @endif
  </div>
 </fieldset>

 <button type="submit" class="select-none cursor-pointer inline-block white-space-no-wrap py-2 px-4 rounded border border-transparent leading-tight text-center">{{ __( 'Create' ) }}</button>
</form>
