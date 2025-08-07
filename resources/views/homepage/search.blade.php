{{-- Hero Filter Section with Background Image --}}
<div class="relative min-h-screen pt-24 font-poppins flex items-center justify-center">

  {{-- Background Image --}}
  <div class="absolute inset-0 bg-cover bg-center brightness-75"
       style="background-image: url('/images/modern-apartment-bg.jpg');">
  </div>

  {{-- Colored Overlay using Navbar Accent --}}
  <div class="absolute inset-0 bg-[#021908]/70"></div>

  {{-- Form Content --}}
  <div class="relative z-10 w-full max-w-4xl px-6 md:px-10 py-12 space-y-8 text-[#FFFFFD]">

    {{-- Heading --}}
    <div class="text-center">
      <h1 class="text-3xl md:text-4xl font-bold mb-3 drop-shadow-lg tracking-wide">Find your temporary home with us</h1>
      <p class="text-base md:text-lg max-w-lg mx-auto text-[#FFFFFD]/80">
        Filter apartments by location, price‑range, capacity, type, and amenities.
      </p>
    </div>

    {{-- Filter Form --}}
    <form class="space-y-6" x-data="{ selected: [] }">

      {{-- Location --}}
      <div class="flex justify-center">
        <select class="w-full max-w-sm p-3 rounded border border-[#FFFFFD]/80 bg-[#FFFFFD]/90 text-[#021908] text-sm focus:outline-none focus:ring-2 focus:ring-[#BBCB2F] transition">
          <option>Select Barangay</option>
          @php $barangays = ['Aplaya','Balibago','Caingin','Dila','Dita','Don Jose','Ibaba','Kanluran','Labas','Macabling','Malitlit','Malusak','Market Area','Pooc','Pulong Santa Cruz','Santo Domingo','Sinalhan','Tagapo']; @endphp
          @foreach($barangays as $b) <option>{{ $b }}</option> @endforeach
        </select>
      </div>

      {{-- Price, Capacity, Type --}}
      <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
        {{-- Price --}}
        <div>
          <label class="block text-sm font-semibold mb-1">Price Range</label>
          <div class="flex gap-2">
            <input type="number" placeholder="Min" class="w-1/2 p-2 border border-[#FFFFFD]/80 rounded bg-[#FFFFFD]/90 text-sm text-[#021908] focus:ring-2 focus:ring-[#BBCB2F] focus:outline-none transition">
            <input type="number" placeholder="Max" class="w-1/2 p-2 border border-[#FFFFFD]/80 rounded bg-[#FFFFFD]/90 text-sm text-[#021908] focus:ring-2 focus:ring-[#BBCB2F] focus:outline-none transition">
          </div>
        </div>
        {{-- Capacity --}}
        <div>
          <label class="block text-sm font-semibold mb-1">Capacity</label>
          <select class="w-full p-2 border border-[#FFFFFD]/80 rounded bg-[#FFFFFD]/90 text-sm text-[#021908] focus:ring-2 focus:ring-[#BBCB2F] focus:outline-none transition">
            <option>Any</option><option>1‑2</option><option>3‑4</option><option>5+</option>
          </select>
        </div>
        {{-- Type --}}
        <div>
          <label class="block text-sm font-semibold mb-1">Apartment Type</label>
          <select class="w-full p-2 border border-[#FFFFFD]/80 rounded bg-[#FFFFFD]/90 text-sm text-[#021908] focus:ring-2 focus:ring-[#BBCB2F] focus:outline-none transition">
            <option>Any</option><option>Studio</option><option>One Bedroom</option><option>Two Bedroom</option>
          </select>
        </div>
      </div>

      {{-- Amenities --}}
      <div>
        <label class="block text-sm font-semibold mb-2">Amenities</label>
        <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-5 gap-3">
          @php
            $amenities = [
              ['label'=>'WiFi','icon'=>'wifi'],
              ['label'=>'Parking','icon'=>'car'],
              ['label'=>'Air‑con','icon'=>'snowflake'],
              ['label'=>'Furnished','icon'=>'sofa'],
              ['label'=>'Kitchen','icon'=>'utensils'],
              ['label'=>'Laundry','icon'=>'shirt'],
              ['label'=>'Study','icon'=>'book'],
              ['label'=>'Security','icon'=>'shield-check'],
              ['label'=>'CCTV','icon'=>'video'],
              ['label'=>'Utilities','icon'=>'zap']
            ];
          @endphp
          @foreach($amenities as $a)
            <button type="button"
                    :class="selected.includes('{{ $a['label'] }}') ? 'bg-[#BBCB2F] text-[#021908]' : 'bg-[#FFFFFD]/90 text-[#021908]'"
                    @click="selected.includes('{{ $a['label'] }}') ? selected.splice(selected.indexOf('{{ $a['label'] }}'),1) : selected.push('{{ $a['label'] }}')"
                    class="flex items-center justify-center gap-1 px-3 py-2 border border-[#FFFFFD]/80 rounded-full text-sm font-medium hover:bg-[#BBCB2F]/80 hover:text-[#021908] transition duration-150">
              <i data-lucide="{{ $a['icon'] }}" class="w-4 h-4"></i>
              <span>{{ $a['label'] }}</span>
            </button>
          @endforeach
        </div>
      </div>

      {{-- Search Button --}}
      <!-- <div class="text-center pt-4">
        <button type="submit" class="bg-[#FFFFFD]/90 text-[#021908] px-6 py-2 rounded-full font-semibold hover:bg-[#FEFA95]/90 transition text-sm">
          Search Apartments
        </button>
      </div> -->
    </form>

  </div>
</div>

{{-- AlpineJS & Lucide --}}
<script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
<script src="https://unpkg.com/lucide@latest"></script>
<script>lucide.createIcons();</script>
