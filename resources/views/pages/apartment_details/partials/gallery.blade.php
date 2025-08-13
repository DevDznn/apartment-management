<div class="md:col-span-2">
  <div
    class="relative rounded-lg overflow-hidden mb-6 bg-[#FFFFFD] shadow-md border border-[#BBCB2F]/30"
  >
    <img
      id="selectedImage"
      alt="Selected Apartment"
      class="h-96 w-full object-cover rounded-lg transition-shadow duration-500 ease-in-out"
    />

    <!-- Prev Button -->
    <button
      id="prevBtn"
      type="button"
      aria-label="Previous Image"
      class="absolute left-4 top-1/2 -translate-y-1/2
             bg-white/40 backdrop-blur-sm border border-[#BBCB2F]/40
             p-2.5 rounded-lg shadow-sm
             text-[#021908] hover:bg-[#BBCB2F] hover:text-[#FFFFFD]
             transition ease-in-out duration-300
             focus:outline-none focus:ring-2 focus:ring-[#BBCB2F]/60
             active:scale-95"
    >
      <i data-lucide="chevron-left" class="w-5 h-5"></i>
    </button>

    <!-- Next Button -->
    <button
      id="nextBtn"
      type="button"
      aria-label="Next Image"
      class="absolute right-4 top-1/2 -translate-y-1/2
             bg-white/40 backdrop-blur-sm border border-[#BBCB2F]/40
             p-2.5 rounded-lg shadow-sm
             text-[#021908] hover:bg-[#BBCB2F] hover:text-[#FFFFFD]
             transition ease-in-out duration-300
             focus:outline-none focus:ring-2 focus:ring-[#BBCB2F]/60
             active:scale-95"
    >
      <i data-lucide="chevron-right" class="w-5 h-5"></i>
    </button>
  </div>

  <div
    id="thumbnails"
    class="flex gap-3 overflow-x-auto no-scrollbar rounded-lg border border-[#D3E6D6]/30 p-2.5 bg-[#FEFA95]/20"
  ></div>
</div>
