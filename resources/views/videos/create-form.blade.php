<form method="POST" enctype="multipart/form-data" action="{{ route( 'videos.upload' ) }}">
 @csrf

 <fieldset class="mb-8 p-4 border border-black">
  <legend class="p-2 font-light italic">{{ __( 'Video details' ) }}</legend>

  <div>
   <label for="uservideo" class="block mb-2 font-bold">{{ __( 'Choose Video' ) }}</label>
   <input type="file" accept="video/*" name="uservideo" id="uservideo" class="appearance-none w-full py-2 px-4 rounded border-2 border-black leading-tight" required />

   @if ( $errors->has( 'uservideo' ) )
    <p>{{ $errors->first( 'uservideo' ) }}</p>
   @endif
  </div>
 </fieldset>

 <button type="submit" class="select-none cursor-pointer inline-block white-space-no-wrap py-2 px-4 rounded border border-transparent leading-tight text-center bg-black text-white">{{ __( 'Upload video' ) }}</button>
</form>
