<script src="https://unpkg.com/lucide@latest"></script>
<script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>

<script>
  document.addEventListener("DOMContentLoaded", function() {
    lucide.createIcons();
  });
</script>

<section class="bg-[#FFFFFD] pt-24 px-4 md:px-8" x-data="{
    apartments: Array.from({ length: 40 }), // Simulated 40 apartments
    perPage: 8,
    currentPage: 1,
    get totalPages() {
      return Math.ceil(this.apartments.length / this.perPage);
    },
    get paginated() {
      const start = (this.currentPage - 1) * this.perPage;
      return this.apartments.slice(start, start + this.perPage);
    },
    changePerPage(value) {
      this.perPage = parseInt(value);
      this.currentPage = 1;
    }
}">
  <div class="max-w-7xl mx-auto">
    <h2 class="text-[#021908] text-2xl md:text-3xl font-bold text-center mb-2">
      Apartments in Santa Rosa
    </h2>
    <p class="text-sm md:text-sm max-w-lg mx-auto text-center text-[#021908] mb-6">
      This is all listed apartments available for rent.
    </p>

    <!-- Show Per Page Selector -->
    <div class="flex justify-end items-center mb-4">
      <label class="mr-2 text-[#021908] font-semibold align-items-center text-sm">Show per page:</label>
      <select @change="changePerPage($event.target.value)" class="p-1 rounded bg-white text-[#021908] text-sm border border-[#BBCB2F]">
        <option value="8">8</option>
        <option value="16">16</option>
        <option value="24">24</option>
        <option value="32">32</option>
        <option value="40">40</option>
      </select>
    </div>

    <!-- Apartment Cards -->
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 xl:grid-cols-4 gap-6">
      <template x-for="(item, index) in paginated" :key="index">
        @include('components.apartment-card')
      </template>
    </div>

    <!-- Pagination -->
    <div class="flex justify-center items-center gap-2 mt-10 text-[#021908] text-sm font-medium overflow-x-auto whitespace-nowrap no-scrollbar">
      <button
        @click="currentPage = Math.max(currentPage - 1, 1)"
        :disabled="currentPage === 1"
        class="px-4 py-2 rounded-full hover:bg-[#BBCB2F] disabled:opacity-40 transition">
        Prev
      </button>

      <template x-for="page in totalPages" :key="page">
        <button
          @click="currentPage = page"
          :class="{
        'bg-[#BBCB2F] text-[#021908]': page === currentPage,
        'hover:bg-[#BBCB2F]/60': page !== currentPage
      }"
          class="w-8 h-8 rounded-full flex items-center justify-center transition">
          <span x-text="page"></span>
        </button>
      </template>

      <button
        @click="currentPage = Math.min(currentPage + 1, totalPages)"
        :disabled="currentPage === totalPages"
        class="px-4 py-2 rounded-full hover:bg-[#BBCB2F] disabled:opacity-40 transition">
        Next
      </button>
    </div>

    <style>
      /* Optional: hide scrollbar for cleaner UI */
      .no-scrollbar::-webkit-scrollbar {
        display: none;
      }

      .no-scrollbar {
        -ms-overflow-style: none;
        scrollbar-width: none;
      }
    </style>

  </div>
</section>