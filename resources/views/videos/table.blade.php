<table class="relative overflow-hidden w-full">
 <thead>
  <tr>
   <th scope="col" class="p-2 font-semibold text-left">{{ __( 'Name' ) }}</th>
   <th scope="col" class="p-2 font-semibold text-left">{{ __( 'Type' ) }}</th>
   <th scope="col" class="p-2 font-semibold text-left">{{ __( 'Size' ) }}</th>
   <th scope="col" class="p-2 font-semibold text-left">{{ __( 'Actions' ) }}</th>
  </tr>
 </thead>
 <tbody>

 @forelse( $videos as $video )
  <tr>
   <td>{{ $video->name }}</td>
   <td>{{ $video->type }}</td>
   <td>{{ $video->size }}</td>
   <td>
    @include( 'videos.delete-form' )

   </td>
  </tr>

 @empty
  <tr><td colspan="4">{{ __( 'No videos' ) }}</td></tr>

 @endforelse

 </tbody>
</table>
