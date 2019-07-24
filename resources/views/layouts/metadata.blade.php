
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="referrer" content="{{ !empty( $referrer )? $referrer : config( 'meta.referrer' ) }}" />
	<meta name="robots" content="{{ !empty( $robots )? $robots : config( 'meta.robots' ) }}" />
	<meta name="description" content="{{ !empty( $description )? $description : config( 'meta.description' ) }}" />
	<meta name="keywords" content="{{ !empty( $keywords )? $keywords : config( 'meta.keywords' ) }}" />

	<!-- Facebook OpenGraph -->
	@if( config( 'meta.fb_app_id' ) !== '' )
	<meta property="fb:app_id" content="{{ config( 'meta.fb_app_id' ) }}" />
	@endif
	<meta property="og:locale" content="{{ config( 'app.locale' ) }}" />
	<meta property="og:type" content="{{ !empty( $type )? $type : config( 'meta.type' ) }}" />
	<meta property="og:url" content="{{ url()->current() }}" />
	<meta property="og:site_name" content="{{ config( 'app.name' ) }}" />
	<meta property="og:title" content="{{ !empty( $title )? $title : config( 'meta.title' ) }}" />
	<meta property="og:description" content="{{ !empty( $description )? $description : config( 'meta.description' ) }}" />
	<meta property="og:image" content="{{ !empty( $logo )? $logo : config( 'meta.logo' ) }}" />
 <meta property="og:image:type" content="image/png" />
 <meta property="og:image:width" content="1200" />
 <meta property="og:image:height" content="1200" />
	<meta property="og:image" content="{{ !empty( $mark )? $mark : config( 'meta.mark' ) }}" />
 <meta property="og:image:type" content="image/png" />
 <meta property="og:image:width" content="1200" />
 <meta property="og:image:height" content="620" />

	<!-- Twitter Card -->
	@if( config( 'meta.twitter_card' ) !== '' )
	<meta name="twitter:card" content="{{ !empty( $twitter_card )? $twitter_card : config( 'meta.twitter_card' ) }}" />
	@endif
	@if( config( 'meta.twitter_site' ) !== '' || !empty( $twitter_site ) )
	<meta name="twitter:site" content="{{ !empty( $twitter_site )? $twitter_site : config( 'meta.twitter_site' ) }}" />
	@endif
	<meta name="twitter:title" content="{{ !empty( $title )? $title : config( 'meta.title' ) }}" />
	<meta name="twitter:description" content="{{ !empty( $description )? $description : config( 'meta.description' ) }}" />
	<meta name="twitter:image:src" content="{{ !empty( $logo )? $logo : config( 'meta.logo' ) }}" />
 <meta name="twitter:image:width" content="1200" />
 <meta name="twitter:image:height" content="1200" />
