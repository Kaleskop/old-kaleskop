<footer>
@guest
 <div>
  <div>
   <p>{{ __( 'Ready to Get Started?' ) }}</p>
   <p>{{ config( 'app.name' ) }}. {{ __( 'We Advertise!' ) }}</p>
  </div>
  <div>
   <p><a href="{{ route( 'register' ) }}">{{ __( 'Sign up For Free' ) }}</a></p>
  </div>
 </div>

@endguest

 <div>
  <div>
   <p>{{ __( 'Resources' ) }}</p>
   <p><a href="{{ route( 'website.pricing' ) }}">{{ __( 'Pricing' ) }}</a></p>
   <p><a href="https://discord.gg/rcMk7M5" target="_blank">Discord</a></p>
  </div>

  <div>
   <p>{{ __( 'Company' ) }}</p>
   <p><a href="{{ route( 'terms.general' ) }}">{{ __( 'Terms of Service' ) }}</a></p>
   <p><a href="">{{ __( 'Privacy' ) }}</a></p>
   <p><a href="mailto:info@kaleskop.com">{{ __( 'Contact' ) }}</a></p>
  </div>
 </div>

 <div>
  <div>
   <p>&copy; 2019 - <a href="{{ route( 'website.homepage' ) }}">{{ config( 'app.name' ) }}</a></p>
   <p><small>{{ __( 'Built by' ) }} <a href="https://andreagiuseppe.com" target="_blank">AndreaGiuseppe</a>.</small></p>
  </div>
  
  <div>
   <p><a href="https://twitter.com/kaleskopadv" target="_blank">Twitter</a> <a href="https://github.com/Kaleskop" target="_blank">Github</a></p>
  </div>
 </div>
</footer>
