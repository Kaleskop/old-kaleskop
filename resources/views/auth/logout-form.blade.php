<form method="POST" action="{{ route( 'logout' ) }}">
 @csrf

 <button type="submit" class="select-none cursor-pointer inline-block white-space-no-wrap py-2 px-4 rounded border border-transparent leading-tight text-center">{{ __( 'Logout' ) }}</button>
</form>
