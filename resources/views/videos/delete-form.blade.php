<form method="POST" action="{{ route( 'videos.destroy', $video ) }}">
 @csrf
 @method('DELETE')

 <button type="submit">{{ __( 'Delete' ) }}</button>
</form>
