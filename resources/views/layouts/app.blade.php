<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title', 'Rent Me')</title>

  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
  <script src="//unpkg.com/alpinejs" defer></script>

  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    @include('components.navbar')
    @include('homepage.search')
    @include('homepage.searched-apartment')
    @include('homepage.recommended-apartment')
    @include('homepage.newlisted-apartment')
    @include('homepage.map-apartment')
    @include('components.footer')

    {{-- AlpineJS & Lucide Icons --}}
</body>
</html>
