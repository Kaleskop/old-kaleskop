<table>
 <thead>
  <tr>
   <th scope="col">{{ __( 'Name' ) }}</th>
   <th scope="col">{{ __( 'Price' ) }}</th>
   <th scope="col">{{ __( 'Actions' ) }}</th>
  </tr>
 </thead>
 <tbody>

 @forelse( $plans as $plan )
  <tr>
   <td>{{ $plan->name }}</td>
   <td>{{ $plan->price }}</td>
   <td>
    @include( 'plans.delete-form' )

   </td>
  </tr>

 @empty
  <tr><td colspan="3">{{ __( 'No plans' ) }}</td></tr>

 @endforelse

 </tbody>
</table>
