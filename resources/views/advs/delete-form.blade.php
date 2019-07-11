<form method="POST" action="{{ route( 'advs.destroy', $adv ) }}">
 @csrf
 @method('DELETE')

 <button type="submit" class="select-none cursor-pointer inline-block white-space-no-wrap py-2 px-4 rounded border border-transparent leading-tight text-center bg-red-600 text-white">{{ __( 'Delete' ) }}</button>
</form>
