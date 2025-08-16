<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title', 'Apartment')</title>

  <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
  <script src="https://cdn.tailwindcss.com"></script>

  <!-- @vite(['resources/css/app.css', 'resources/js/app.js']) -->
</head>

<body>
  @include('components.navbar')
  @include('pages.apartment.partials.search-filter')
  @include('homepage.map-apartment')

  @include('components.footer')


</body>

</html>