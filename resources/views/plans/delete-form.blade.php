<form method="POST" action="{{ route( 'plans.destroy', $plan ) }}">
 @csrf
 @method('DELETE')

 <button type="submit">{{ __( 'Delete' ) }}</button>
</form>
