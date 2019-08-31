<div class="w-full sm:w-1/2 md:w-1/4 mb-6 p-2">
 <a href="{{ route( 'website.advs', $adv ) }}" class="block bg-white">
  <article class="hover:shadow-lg">
   <img src="{{ $adv->storageUrl }}" alt="Advertisement cover image" />
   <h4 class="p-2 font-medium text-xl text-center">{{ $adv->title }}</h4>
  </article>
 </a>
</div>
