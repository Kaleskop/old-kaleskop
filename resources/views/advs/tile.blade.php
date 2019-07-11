<article>
 <header>
  <h3>{{ $adv->title }}</h3>

  <publish-button endpoint="{{ route( 'advs.publish', $adv ) }}"{{ $adv->isPublished() ? ' published' : '' }}></publish-button>
 </header>

 <p>{{ $adv->endpoint }}</p>
</article>
