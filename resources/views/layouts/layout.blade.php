<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="font-sans antialiased">
 <head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}" />

  <!-- Stylesheets -->
  <link rel="stylesheet" href="{{ asset( 'css/app.css' ) }}" />
  @stack( 'stylesheets' )

  <!-- Javascript -->
  @include( 'vue-templates.vue-go' )

  <script src="{{ asset( 'js/app.js' ) }}" defer></script>
  @stack( 'scripts' )

  <!-- analytics layer -->
 <script async src="https://www.googletagmanager.com/gtag/js?id=UA-119492692-1"></script>
 <script>
  window.dataLayer = window.dataLayer || [];function gtag(){dataLayer.push(arguments);}gtag('js', new Date());gtag('config', 'UA-119492692-1');
 </script>

  <title>{{ config( 'app.name' ) }}{{ isset( $title ) ? " | {$title}" : '' }}</title>
 </head>
 <body class="leading-normal font-normal text-left text-base">
  <div id="kaleskop">
   @yield( 'body' )

   <cookie-strip></cookie-strip>
  </div>
 </body>
</html>
