<form method="POST" action="{{ route( 'advs.store' ) }}">
 @csrf

 <fieldset class="mb-8 p-4 border border-black">
  <legend class="p-2 font-light italic">{{ __( 'Advertisement details' ) }}</legend>

  <div class="mb-4">
   <label for="video_id" class="block mb-2 font-bold">{{ __( 'Video' ) }}</label>
   <select name="video_id" id="video_id" class="appearance-none outline-none cursor-pointer block w-full py-2 px-4 rounded border-2 border-transparent leading-tight bg-black text-white" required>
    @foreach( $videos as $video )
     <option value="{{ $video->id }}">{{ $video->name }}</option>

    @endforeach
   </select>

   @if ( $errors->has( 'video_id' ) )
    <p>{{ $errors->first( 'video_id' ) }}</p>
   @endif
  </div>

  <div class="mb-4">
   <label for="title" class="block mb-2 font-bold">{{ __( 'Title' ) }}</label>
   <input type="text" name="title" id="title" class="appearance-none w-full py-2 px-4 rounded border-2 border-black leading-tight" value="{{ old( 'title' ) }}" required />

   @if ( $errors->has( 'title' ) )
    <p>{{ $errors->first( 'title' ) }}</p>
   @endif
  </div>

  <div>
   <label for="endpoint" class="block mb-2 font-bold">{{ __( 'Endpoint' ) }}</label>
   <input type="text" name="endpoint" id="endpoint" class="appearance-none w-full py-2 px-4 rounded border-2 border-black leading-tight" value="{{ old( 'endpoint' ) }}" required />

   @if ( $errors->has( 'endpoint' ) )
    <p>{{ $errors->first( 'endpoint' ) }}</p>
   @endif
  </div>
 </fieldset>

 <button type="submit" class="select-none cursor-pointer inline-block white-space-no-wrap py-2 px-4 rounded border border-transparent leading-tight text-center bg-black text-white">{{ __( 'Create' ) }}</button>
</form>
