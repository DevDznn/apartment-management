<script src="https://unpkg.com/lucide@latest"></script>
<script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>

<script>
  document.addEventListener("DOMContentLoaded", function () {
    lucide.createIcons();
  });
</script>

<section class="bg-[#FFFFFD] py-10 px-4 md:px-8 font-poppins" x-data="{
    apartments: Array.from({ length: 20 }), // 20 fake items
    perPage: 8,
    currentPage: 1,
    get totalPages() {
      return Math.ceil(this.apartments.length / this.perPage);
    },
    get paginated() {
      const start = (this.currentPage - 1) * this.perPage;
      return this.apartments.slice(start, start + this.perPage);
    }
}">
  <div class="max-w-7xl mx-auto">
    <h2 class="text-[#021908] text-2xl md:text-3xl font-bold text-center mb-2">
      Searched Apartments
    </h2>
    <p class="text-center text-[#021908]/70 text-sm md:text-base mb-6">
      Showing <span x-text="apartments.length"></span> apartments found
    </p>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 xl:grid-cols-4 gap-6">
      <template x-for="(item, index) in paginated" :key="index">
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
          <div class="p-4 flex flex-col gap-2 flex-grow">
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
            <div class="flex justify-end gap-2 mt-4">
              <button class="bg-[#BBCB2F]/30 border border-[#BBCB2F] text-[#021908] text-xs px-4 py-2 rounded-full font-semibold hover:bg-[#BBCB2F]/50 transition">
                Locate
              </button>
              <button class="bg-[#BBCB2F] text-[#021908] text-xs px-4 py-2 rounded-full font-semibold hover:bg-[#FEFA95] transition">
                Message
              </button>
            </div>
          </div>
        </div>
      </template>
    </div>

    <div class="flex flex-wrap justify-center items-center gap-2 mt-10 text-[#021908] text-sm font-medium">
      <button
        @click="currentPage = Math.max(currentPage - 1, 1)"
        :disabled="currentPage === 1"
        class="px-4 py-2 rounded-full hover:bg-[#BBCB2F] disabled:opacity-40 transition"
      >
        Prev
      </button>

      <template x-for="page in totalPages" :key="page">
        <button
          @click="currentPage = page"
          :class="{
            'bg-[#BBCB2F] text-[#021908]': page === currentPage,
            'hover:bg-[#BBCB2F]/60': page !== currentPage
          }"
          class="w-8 h-8 rounded-full flex items-center justify-center transition"
        >
          <span x-text="page"></span>
        </button>
      </template>

      <button
        @click="currentPage = Math.min(currentPage + 1, totalPages)"
        :disabled="currentPage === totalPages"
        class="px-4 py-2 rounded-full hover:bg-[#BBCB2F] disabled:opacity-40 transition"
      >
        Next
      </button>
    </div>
  </div>
</section>
