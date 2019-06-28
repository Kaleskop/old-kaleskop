<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
 <head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}" />

  <!-- Stylesheets -->
  @stack( 'stylesheets' )

  <!-- Javascript -->
  <script src="{{ asset( 'js/app.js' ) }}" defer></script>
  @stack( 'scripts' )

  <title>{{ config( 'app.name' ) }}{{ isset( $title ) ? " | {$title}" : '' }}</title>
 </head>
 <body>
  <div id="kaleskop">
   @yield( 'body' )

  </div>
 </body>
</html>
