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
                  @include('components.apartment-card')

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
