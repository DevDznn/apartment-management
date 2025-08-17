<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Apartment Navigation</title>

  <!-- Tailwind CSS -->
  @vite('resources/css/app.css')

  <!-- Lucide Icons -->
  <script src="https://unpkg.com/lucide@latest"></script>

  <!-- Mapbox CSS -->
  <link href="https://api.mapbox.com/mapbox-gl-js/v2.15.0/mapbox-gl.css" rel="stylesheet" />
  <link href="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-directions/v4.1.1/mapbox-gl-directions.css" rel="stylesheet" />

  <!-- Custom CSS -->
  <link href="{{ asset('css/navigation.css') }}" rel="stylesheet" />
</head>

<body>

  <!-- Back Button -->
  <button
    id="backBtn"
    class="absolute top-4 left-4 z-50 bg-[#021908] hover:bg-[#BBCB2F] hover:text-[#021908] text-[#BBCB2F] p-3 rounded-full shadow-lg transition flex items-center justify-center"
    onclick="window.history.back()"
    aria-label="Back">
    <i data-lucide="arrow-left" class="w-5 h-5"></i>
  </button>

  <!-- Route Info Panel -->
  <div id="route-panel" class="hidden" aria-live="polite" aria-atomic="true" aria-relevant="all" tabindex="0" role="region">
    <div id="route-summary" aria-label="Route summary, click to expand or collapse">
      <div>
        <i data-lucide="map-pin" class="w-6 h-6"></i>
        <span id="distance">-- km</span>
      </div>
      <div>
        <i data-lucide="clock" class="w-6 h-6"></i>
        <span id="duration">-- mins</span>
      </div>
      <i id="toggle-icon" data-lucide="chevron-up" class="w-6 h-6" aria-hidden="true"></i>
    </div>

    <ul id="directions-list" aria-label="Detailed driving directions" class="mt-4"></ul>
  </div>

  <!-- Map -->
  <div id="map"></div>

  <!-- Mapbox JS -->
  <script src="https://api.mapbox.com/mapbox-gl-js/v2.15.0/mapbox-gl.js"></script>
  <script src="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-directions/v4.1.1/mapbox-gl-directions.js"></script>

  <!-- Custom JS -->
  <script src="{{ asset('js/navigation.js') }}"></script>
</body>

</html>