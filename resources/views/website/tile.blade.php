<article class="w-full sm:w-1/2 md:w-1/4 mb-6 hover:shadow-lg">
 <img src="{{ $adv->storageUrl }}" alt="Advertisement cover image" />
 <h4 class="mb-2 p-2 font-medium text-xl text-center"><a href="{{ route( 'website.advs', $adv ) }}">{{ $adv->title }}</a></h4>
</article>
