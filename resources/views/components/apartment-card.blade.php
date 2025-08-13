<div class="bg-[#FEFA95]/10 rounded-2xl shadow-md overflow-hidden flex flex-col transition hover:shadow-xl border border-[#BBCB2F]/40">
  <div class="relative h-44">
    <img src="/images/modern-apartment-bg.jpg"
      alt="Apartment"
      class="w-full h-full object-cover"
      onerror="this.src='/images/default.jpg'">
    <div class="absolute top-2 right-2 bg-white/70 text-[#021908] text-xs px-3 py-1 rounded-full font-semibold">
      Studio
    </div>
  </div>

  <!-- Link for details -->
  <a href="/apartment-details" class="p-4 flex flex-col gap-2 flex-grow">
    <div class="flex justify-between items-center">
      <p class="text-lg font-bold text-[#021908]">₱12,000</p>
      <p class="text-xs font-medium text-[#021908]/70">per month</p>
    </div>
    <div class="flex items-center gap-2 text-sm text-[#021908] font-semibold">
      <i data-lucide="map-pin" class="w-4 h-4"></i>
      <span>Balibago, Santa Rosa</span>
    </div>
    <div class="text-xs text-[#021908]/80 line-clamp-2">
      Near SM City Santa Rosa, fully furnished with internet, aircon, and parking.
    </div>
    <div class="flex items-center gap-3 text-xs mt-2 text-[#021908]">
      <div class="flex items-center gap-1"><i data-lucide="users" class="w-4 h-4"></i> 2 Pax</div>
      <div class="flex items-center gap-1"><i data-lucide="wifi" class="w-4 h-4"></i> WiFi</div>
      <div class="flex items-center gap-1"><i data-lucide="snowflake" class="w-4 h-4"></i> Aircon</div>
    </div>
  </a>

  <!-- Buttons outside the link -->
  <div class="flex justify-end gap-2 p-4">
    <button onclick="window.location.href='/location'" class="bg-[#BBCB2F]/30 border border-[#BBCB2F] text-[#021908] text-xs px-4 py-2 rounded-full font-semibold hover:bg-[#BBCB2F]/50 transition">
      Locate
    </button>
    <button onclick="window.location.href='/messages'" class="bg-[#BBCB2F] text-[#021908] text-xs px-4 py-2 rounded-full font-semibold hover:bg-[#FEFA95] transition">
      Message
    </button>
  </div>
</div>
