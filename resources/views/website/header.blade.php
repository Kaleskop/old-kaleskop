<header>
 <div class="container mx-auto px-6">
  <nav class="py-2 flex justify-between items-center">
   <h1 class="font-brand font-semibold text-2xl">{{ config( 'app.name' ) }}</h1>

   <div>
    <a href="{{ route( 'account.index' ) }}">
     <span></span>
     <span>{{ __( 'Account' ) }}</span>
    </a>

    <a href="{{ route( 'website.channels' ) }}">
     <span></span>
     <span>{{ __( 'Channels' ) }}</span>
    </a>
   </div>
  </nav>
 </div>
</header>
