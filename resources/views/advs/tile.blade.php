<article class="mb-4 p-2 border-2 border-black">
 <div class="w-full sm:flex">
  <div class="w-full sm:w-1/4 mr-4">
   <img src="{{ $adv->cover_path }}" alt="Advertisement cover image" />
  </div>

  <div>
   <header class="mb-4 flex items-center">
    <h3 class="mr-4 font-medium text-2xl">{{ $adv->title }}</h3>

    <publish-button endpoint="{{ route( 'advs.publish', $adv ) }}"{{ $adv->isPublished() ? ' published' : '' }}></publish-button>
   </header>

   <p class="font-light text-sm">{{ $adv->endpoint }}</p>
  </div>
 </div>
</article>
