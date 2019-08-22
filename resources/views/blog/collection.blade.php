@extends( 'layouts.page' )

@section( 'page' )
<section class="article px-6 md:py-6 md:w-4/5">
 <header class="mb-6">
  <h2 class="mb-2 font-medium text-3xl">{{ __( 'Resource Collection' ) }}</h2>
 </header>

 <p class="mb-2">Today I want to focus on the main function every archive should have.</p>
 <p class="mb-6">Such an archive, shall be able to collect documents/resources to be catalogue. In <span class="font-brand font-semibold">Kaleskop</span> resources we are trying to collect are the so called: "<strong>commercials</strong>".</p>

 <p class="mb-6">The very important premise here, is to clarify the meaning of "commercials":</p>

 <blockquote class="my-8 py-2 pl-6 font-light text-xl border-l-4 border-black">
  <p><b>Commercials</b> includes short-term audiovisual content, based on the advertising of a specific business brand, product or service.</p>
 </blockquote>

 <p class="mb-6">The fundamental aspects resources must have, are:</p>

 <ul class="list-inside list-disc mb-6 pl-4">
  <li class="mb-2"><b>audiovisual content</b> - we collect <em>only</em> common video formats (.mp4, .3gp, .ogg, .avi, .webm, etc..),</li>
  <li class="mb-2"><b>short-term</b> - commercials needs to be <em>short</em> about 20 to 90 seconds prefered (but we also consider longer lengths),</li>
  <li><b>advertising a specific product or service</b> - <em>the main subject</em> of your "commercials" <em>is you</em>, your products, your brands or your services.</li>
 </ul>

 <p class="mb-6">Any other resource that does not respect the fundamentals of the "commercials" will be moderated by the archive through the internal functions of our system.</p>

 <div class="clearfix p-6 border-2 border-black">
  <img src="{{ asset( 'resources/images/layout/blog/collection/file-upload.gif' ) }}" alt="File upload process preview" class="float-left w-auto md:w-48 mr-4" />

  <p class="mb-4 font-medium text-2xl">Collection</p>

  <p class="mb-4 font-thin">I decided to use a very simple method to collect resources.</p>
  <p class="mb-2">As you can see, on the left, there's an example of how <b>you can upload your "commercials"</b> inside the <span class="font-brand font-semibold">Kaleskop</span> archive by <b>using our powerfull widget</b>.</p>
  <p class="mb-2">With few clicks you are able to upload your "commercials" into the in-cloud storage space dedicated to your company.</p>
  <p>All the features of conversion, adaptation and compression will be managed by the system in order to provide users with a top-level experience.</p>
 </div>

 @include( 'blog.andrea-signature' )

 <p class="mb-2">I'm planning to post frequently on this blog with updates on my progress, deep dives into features, highlights, screenshots & videos.</p>
 <p>In the meantime you can familiarize yourself with the application by <a href="{{ route( 'register' ) }}" class="underline">registering your company</a> to take advantage of the 500Mb of free storage.</p>

 <hr class="my-12 border-t-2 border-black" />

 <p class="mb-2">Or, if you'd like to stay updated on upcoming events.</p>

 @include( 'newsletters.newsletter-section' )

</section>

@endsection

@push( 'metadata' )
 @include( 'layouts.metadata', [
  'twitter_card' => 'summary',
  'title' => "Kaleskop | Resource Collection Widget",
  'description' => "A brief tour on our resource collection widget"
 ] )

@endpush
