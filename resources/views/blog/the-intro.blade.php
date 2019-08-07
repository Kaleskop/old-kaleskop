@extends( 'layouts.page' )

@section( 'page' )
<section class="article px-6 md:py-6 md:w-4/5">
 <header class="mb-6">
  <h2 class="mb-2 font-medium text-3xl">{{ __( 'A brief introduction' ) }}</h2>
 </header>

 <video-player v-bind:video="{{ $intro }}"></video-player>

 <p class="mt-4 mb-4 font-bold text-xl">And Here She Is!</p>
 <p>That will be the introduction used at the beginning of every Kaleskop production. <em>Our firm, as simple as possible</em>.</p>

 <hr class="my-12 border-t-2 border-black" />

 <p class="mb-4 font-medium text-2xl">The most important 5 seconds of our history</p>
 <p class="mb-6">The short is <b>only</b> 5 seconds but we worked hard to achieve the perfect balance between our logo's fade-in and out.</p>

 <p class="mb-2">If we consider a 5 seconds short, filmed at 24fps rate, we get <em>120 frames</em> to work with.</p>
 <p class="mb-2">You can quicly understand that finding the right rythm of the animation is easy, but not obvious.</p>
 <p class="mb-2">We could've just, you know, thrown the logo there, apply a standard fade in/out and how it comes.. But, when you start thinking:</p>

 <ul class="list-inside mb-6 pl-4">
  <li class="mb-2">&ldquo; <em>What happens if someone has a slow connection?</em> &rdquo;,</li>
  <li class="mb-2">&ldquo; <em>How will you see the logo when the next video starts with a fade?</em> &rdquo;,</li>
  <li class="mb-2">&ldquo; <em>And if it starts suddenly?</em> &rdquo;,</li>
  <li class="mb-2">&ldquo; <em>May I use music?</em> &rdquo;,</li>
  <li>&ldquo; <em>An effect?</em> &rdquo;.</li>
 </ul>

 <p class="mb-2">Well, <b>it was more a work of reduction</b> rather than adding effects, musics and vfx.</p>
 <p class="mb-6">It's easy to jot down something at random and hope that it works, while it's much more complicated to minimize <strong>to create a product that can last forever</strong>.</p>

 <blockquote class="my-8 py-2 pl-6 font-light text-xl border-l-4 border-black">
  <p>We made a simple, direct and clean introduction to Kaleskop.</p>
 </blockquote>

 <p class="mb-2">If you'd like to stay updated on upcoming events.</p>

 @include( 'newsletters.newsletter-section' )

</section>

@endsection

@push( 'metadata' )
 @include( 'layouts.metadata', [
  'title' => "Kaleskop | A brief introduction",
  'description' => "See our brand new logo animation"
 ] )

@endpush
