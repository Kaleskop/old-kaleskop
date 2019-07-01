<script>
 window.KALESKOP = {!! json_encode([
  'signedIn' => Auth::check(),
  'csrfToken' => csrf_token(),
  'user' => Auth::id(),
 ]) !!};
</script>
