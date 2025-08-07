{{-- Newly Listed Apartments --}}
<section class="bg-[#FFFFFD] py-12 px-4 md:px-8 font-poppins relative">
  <div class="max-w-7xl mx-auto">
    <h2 class="text-[#021908] text-2xl md:text-3xl font-bold text-center mb-8">
      Newly Listed Apartments
    </h2>

    {{-- Arrows --}}
    <button id="newPrevBtn" class="hidden md:flex absolute left-2 top-[55%] transform -translate-y-1/2 z-10 bg-[#BBCB2F] text-[#021908] p-2 rounded-full shadow hover:bg-[#FEFA95] transition">
      <i data-lucide="chevron-left" class="w-5 h-5"></i>
    </button>

    <button id="newNextBtn" class="hidden md:flex absolute right-2 top-[55%] transform -translate-y-1/2 z-10 bg-[#BBCB2F] text-[#021908] p-2 rounded-full shadow hover:bg-[#FEFA95] transition">
      <i data-lucide="chevron-right" class="w-5 h-5"></i>
    </button>

    {{-- Scrollable Cards --}}
    <div id="newScrollContainer" class="flex gap-6 overflow-x-auto md:overflow-hidden scroll-smooth pb-4 px-1 md:px-0 no-scrollbar">
      @for ($i = 0; $i < 15; $i++)
        <div class="min-w-[280px] max-w-[280px] bg-[#FEFA95]/10 rounded-2xl shadow-md overflow-hidden flex flex-col transition hover:shadow-xl border border-[#BBCB2F]/40 snap-start">
          {{-- Image --}}
          <div class="relative h-44">
            <img
              src="{{ asset('/images/modern-apartment-bg.jpg') }}"
              alt="Apartment"
              class="w-full h-full object-cover"
              onerror="this.src='/images/default.jpg'"
            >
            <div class="absolute top-2 right-2 bg-white/70 text-[#021908] text-xs px-3 py-1 rounded-full font-semibold">
              Studio
            </div>
          </div>

          {{-- Details --}}
          <div class="p-4 flex flex-col gap-2 flex-grow">
            <div class="flex justify-between items-center">
              <p class="text-lg font-bold text-[#021908]">₱10,000</p>
              <p class="text-xs font-medium text-[#021908]/70">per month</p>
            </div>

            <div class="flex items-center gap-2 text-sm text-[#021908] font-semibold">
              <i data-lucide="map-pin" class="w-4 h-4"></i>
              <span>Tagapo, Santa Rosa</span>
            </div>

            <div class="text-xs text-[#021908]/80 line-clamp-2">
              Newly built apartment near City Hall with basic furnishings and good ventilation.
            </div>

            <div class="flex items-center gap-3 text-xs mt-2 text-[#021908]">
              <div class="flex items-center gap-1"><i data-lucide="users" class="w-4 h-4"></i> 2 Pax</div>
              <div class="flex items-center gap-1"><i data-lucide="wifi" class="w-4 h-4"></i> WiFi</div>
              <div class="flex items-center gap-1"><i data-lucide="snowflake" class="w-4 h-4"></i> Aircon</div>
            </div>

            <div class="flex justify-end gap-2 mt-4">
              <button class="bg-[#BBCB2F]/30 border border-[#BBCB2F] text-[#021908] text-xs px-4 py-2 rounded-full font-semibold hover:bg-[#BBCB2F]/50 transition">Locate</button>
              <button class="bg-[#BBCB2F] text-[#021908] text-xs px-4 py-2 rounded-full font-semibold hover:bg-[#FEFA95] transition">Message</button>
            </div>
          </div>
        </div>
      @endfor
    </div>
  </div>
</section>

{{-- JS Scroll Logic for Newly Listed --}}
<script>
  document.addEventListener("DOMContentLoaded", function () {
    const scrollContainer = document.getElementById('newScrollContainer');
    const prevBtn = document.getElementById('newPrevBtn');
    const nextBtn = document.getElementById('newNextBtn');

    function updateArrowVisibility() {
      const scrollLeft = scrollContainer.scrollLeft;
      const maxScrollLeft = scrollContainer.scrollWidth - scrollContainer.clientWidth;

      prevBtn.style.display = scrollLeft <= 0 ? 'none' : 'flex';
      nextBtn.style.display = scrollLeft >= maxScrollLeft - 10 ? 'none' : 'flex';
    }

    prevBtn.addEventListener('click', () => {
      scrollContainer.scrollBy({ left: -300, behavior: 'smooth' });
    });

    nextBtn.addEventListener('click', () => {
      scrollContainer.scrollBy({ left: 300, behavior: 'smooth' });
    });

    scrollContainer.addEventListener('scroll', updateArrowVisibility);
    updateArrowVisibility();
  });
</script>
