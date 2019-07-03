<form method="POST" action="{{ route( 'plans.destroy', $plan ) }}">
 @csrf
 @method('DELETE')

 <button type="submit" class="select-none cursor-pointer inline-block white-space-no-wrap py-2 px-4 rounded border border-transparent leading-tight text-center">{{ __( 'Delete' ) }}</button>
</form>
