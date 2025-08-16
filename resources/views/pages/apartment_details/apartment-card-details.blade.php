<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title', 'Apartment')</title>

  <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css" crossorigin="" />
  <style>
    #map {
      height: 320px;
    }

    .no-scrollbar::-webkit-scrollbar {
      display: none;
    }

    .no-scrollbar {
      -ms-overflow-style: none;
      scrollbar-width: none;
    }
  </style>
  <script src="https://cdn.tailwindcss.com"></script>

  <!-- @vite(['resources/css/app.css', 'resources/js/app.js']) -->
</head>

<body>
  <div class="max-w-7xl mx-auto px-6 md:px-10 py-4">
    @include('components.navbar')
    <div class="pt-24 scroll-mt-50">
      @include('pages.apartment_details.partials.back-button')
    </div>


    <div class="grid md:grid-cols-3 gap-1 ">
      <!-- Gallery: 2 columns wide -->
      <div class="md:col-span-2 flex flex-col ">
        @include('pages.apartment_details.partials.gallery')
      </div>

      <!-- Inquiry sidebar: hidden on mobile -->
      <div class="md:col-span-1 hidden md:flex justify-center ">
        <div class="w-full max-w-md px-4 flex flex-col h-full">
          @include('pages.apartment_details.partials.inquiry-form')
        </div>
      </div>
    </div>

    @include('pages.apartment_details.partials.apartment-info')
    @include('pages.apartment_details.partials.map')

    <!-- Inquiry form bottom for mobile only -->
    <div class="md:hidden my-8 w-full">
      <div class="max-w-md mx-auto">
        @include('pages.apartment_details.partials.inquiry-form')
      </div>
    </div>



  </div>
  @include('components.footer')
  <script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js" crossorigin=""></script>
  <script src="https://unpkg.com/lucide@latest"></script>
  <script src="{{ asset('js/apartment-details.js') }}"></script>
</body>

</html>