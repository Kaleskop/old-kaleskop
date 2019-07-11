<form method="POST" action="{{ route( 'advs.destroy', $adv ) }}">
 @csrf
 @method('DELETE')

 <button type="submit">{{ __( 'Delete' ) }}</button>
</form>
