<article class="mb-4 p-2 border-2 border-black">
 <div class="w-full sm:flex">
  <div class="w-full sm:w-32 mr-4">
   <img src="{{ $adv->storageUrl }}" alt="Advertisement cover image" />
  </div>

  <div class="flex-1">
   <header class="mb-4 flex items-center">
    <h3 class="mr-4 font-medium text-2xl">{{ $adv->title }}</h3>
   </header>

   <footer class="flex justify-between">
    <p class="font-light text-sm">{{ $adv->endpoint }}</p>

    <div>
     <publish-button endpoint="{{ route( 'advs.publish', $adv ) }}"{{ $adv->isPublished() ? ' published' : '' }}></publish-button>
    </div>
   </footer>
  </div>
 </div>
</article>
