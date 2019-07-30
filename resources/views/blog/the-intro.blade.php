@extends( 'layouts.page' )

@section( 'page' )
<section class="px-6 md:py-6 md:w-4/5">
 <header class="mb-6">
  <h2 class="mb-2 font-medium text-3xl">{{ __( 'A brief introduction' ) }}</h2>
 </header>

 <p class="mb-2">I'm working very hard during this time to expand the platform. I have lots of ideas to work on that I want to share with all of you to let you know and appreciate the project.</p>
 <p class="mb-4">If you want to learn more, help and face with me actively you're invited to follow <a href="https://twitter.com/kaleskopadv" target="_blank" class="underline">the Kaleskop official Twitter account</a> or, better, to get involved on <a href="https://discord.gg/rcMk7M5" target="_blank" class="underline">the official Discord channel</a>.</p>

 <blockquote class="my-8 py-2 pl-6 font-light text-xl border-l-4 border-black">
  <p>Keep in mind that this is all still in development. The following information may change.</p>
 </blockquote>

 <p class="mb-4">For those who do not want to: <span>TL;DR</span></p>

 <ul class="list-disc list-inside my-2 pl-4">
  <li><a href="#core" class="mb-2 underline">The archive and the "how to"</a></li>
  <li><a href="#structure" class="mb-2 underline">The structure</a></li>
  <li><a href="#api" class="mb-2 underline">The API</a></li>
  <li><a href="#logo" class="underline">Logo animation</a></li>
 </ul>

 <hr class="my-16 border-t-2 border-black" />

 <p id="core" class="mb-4 font-medium text-2xl">The core idea</p>
 <p class="mb-2">Kaleskop is the advertisement video archive.</p>
 <p class="mb-4">Collect, describe and catalog all the commercials that a company produces during its activity. Also, to advertise, unite and involve <em>brands</em> and <em>people</em>.</p>

 <div class="clearfix my-6">
  <img src="{{ asset( 'resources/images/layout/blog/the-intro/video-uploader.png' ) }}" class="float-left w-32 sm:w-auto mr-4" />
  <p class="mb-4 font-medium text-xl">Everything start here</p>
  <p class="mb-2">The most important function of an archive is to collect the resources to be cataloged. This is where Kaleskop starts collecting resources through its simple, but powerful, widget.
  <p class="mb-4">Select your commercials and start uploading.</p>
 </div>

 <blockquote class="my-8 py-2 pl-6 font-light text-xl border-l-4 border-black">
  <p>Hey, you know you have 1GB of free storage space available? You can upload over 15 minutes of advertising videos, about 10 commercials completely free.</p>
 </blockquote>

 <p id="structure" class="mb-4 font-medium text-2xl">The data structure</p>
 <p class="mb-2">I thought of structuring the archive according to a combination of pre-established labels that allow each company to describe the essential features of resources.</p>
 <p class="mb-4">Such as: the year of production, the director, the production company, cast and language.</p>

 <p class="mb-6">Thanks to this flexible but predetermined structure it will be possible to obtain a solid and fast catalog during the phases of query and search.</p>

 <p id="api" class="mb-4 font-medium text-2xl">The data access</p>
 <p class="mb-2">I am evaluating the idea of developing APIs that allow quick and easy access to resource data. To start, I will use a RESTful system (currently solid and reliable) then over time I will see if I move towards more advanced solutions.</p>
 <p class="mb-2">In addition to the standard <em>JSON format</em>, I thought I would provide an already nice and prompt answer in video format with a dedicated packaged player that can be integrated into the other platforms.</p>
 <p class="mb-2">The greatest challenge to be faced here, will be that of programmatic access to resources, generating authentication tokens that companies will be able to sell to allow other companies to access their resources.</p>
 <p class="mb-4">I'm still studying the subject thoroughly and I'm quite excited about the idea of developing this kind of system.</p>

 <p class="mb-6">At this stage I am concentrating above all on the expansion of the archive and on the functions concerning the management of resources. There is much more to develop and to discuss but I leave you waiting for the next update</p>

 <p id="logo" class="mb-4 font-medium text-2xl">Oh, right! I forgot..</p>
 <p class="mb-2">I always wanted to have a simple and recognizable brand and since we are on the subject of "brief introductions", I am proud to present you the very first video result that I completed with the video team.
 <p class="mb-4">A short (5 second) logo animation to be inserted as an introduction between spots. The trademark!</p>

 <video-player v-bind:video="{{ $intro }}"></video-player>

 <p class="mt-6 mb-2">Bravo, if you have come to read up to this point I suggest you to follow me on <a href="https://twitter.com/kaleskopadv" target="_blank" class="underline">Twitter</a> or better on <a href="https://discord.gg/rcMk7M5" target="_blank" class="underline">Discord</a> so we can discuss the project together.</p>
 <p>You can contribute to the development of the platform on <a href="https://github.com/Kaleskop" target="_blank" class="underline">Github</a>.</p>

 @include( 'blog.andrea-signature' )

</section>

@endsection

@push( 'metadata' )
 @include( 'layouts.metadata', [
  'title' => "Kaleskop | A brief introduction",
  'description' => "I'll tell you where I'm at and where I want to go."
 ] )

@endpush
