<footer class="mt-8 pt-16 pb-4">
 <div class="container mb-4 mx-auto px-6">
  <p class="font-brand font-semibold text-2xl">{{ config( 'app.name' ) }}. {{ __( 'We Advertise!' ) }}</p>
 </div>

 <div class="container mx-auto px-6 flex">
  <div class="mr-4 mb-4 px-2">
   <p class="mb-2 font-medium text-xl">{{ __( 'Resources' ) }}</p>
   <p><a href="{{ route( 'website.pricing' ) }}" class="underline">{{ __( 'Pricing' ) }}</a></p>
   <p><a href="https://discord.gg/rcMk7M5" class="underline" target="_blank">Discord</a></p>
  </div>

  <div class="mr-4 mb-4 px-2">
   <p class="mb-2 font-medium text-xl">{{ __( 'Company' ) }}</p>
   <p><a href="{{ route( 'terms.general' ) }}" class="underline">{{ __( 'Terms of Service' ) }}</a></p>
   <p><a href="" class="underline">{{ __( 'Privacy' ) }}</a></p>
   <p><a href="mailto:info@kaleskop.com" class="underline">{{ __( 'Contact' ) }}</a></p>
  </div>
 </div>

 <div class="container mx-auto px-6">
  <div>
   <p class="mb-2 text-sm">&copy; 2019 - <a href="{{ route( 'website.homepage' ) }}" class="font-brand font-semibold underline">{{ config( 'app.name' ) }}</a></p>
   <p><small>{{ __( 'Built by' ) }} <a href="https://andreagiuseppe.com" target="_blank" class="underline">AndreaGiuseppe</a>.</small></p>
  </div>
  
  <div class="mt-6">
   <p><a href="https://twitter.com/kaleskopadv" target="_blank" class="underline mr-4">Twitter</a> <a href="https://github.com/Kaleskop" target="_blank" class="underline">Github</a></p>
  </div>
 </div>
</footer>
