<form method="POST" action="{{ route( 'advs.store' ) }}">
 @csrf

 <fieldset>
  <legend>{{ __( 'Advertisement details' ) }}</legend>

  <div>
   <label for="video_id">{{ __( 'Video' ) }}</label>
   <select name="video_id" id="video_id" required>
    @foreach( $videos as $video )
     <option value="{{ $video->id }}">{{ $video->name }}</option>

    @endforeach
   </select>

   @if ( $errors->has( 'video_id' ) )
    <p>{{ $errors->first( 'video_id' ) }}</p>
   @endif
  </div>

  <div>
   <label for="title">{{ __( 'Title' ) }}</label>
   <input type="text" name="title" id="title" value="{{ old( 'title' ) }}" required />

   @if ( $errors->has( 'title' ) )
    <p>{{ $errors->first( 'title' ) }}</p>
   @endif
  </div>

  <div>
   <label for="endpoint">{{ __( 'Endpoint' ) }}</label>
   <input type="text" name="endpoint" id="endpoint" value="{{ old( 'endpoint' ) }}" required />

   @if ( $errors->has( 'endpoint' ) )
    <p>{{ $errors->first( 'endpoint' ) }}</p>
   @endif
  </div>
 </fieldset>

 <button type="submit">{{ __( 'Create' ) }}</button>
</form>
