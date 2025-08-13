{{-- Lucide Icons --}}
<script src="https://unpkg.com/lucide@latest"></script>
<script src="https://unpkg.com/lucide@latest"></script>
<script>
  document.addEventListener("DOMContentLoaded", function () {
    lucide.createIcons();

    const scrollContainer = document.getElementById('scrollContainer');
    const prevBtn = document.getElementById('prevBtn');
    const nextBtn = document.getElementById('nextBtn');

    function updateArrowVisibility() {
      const scrollLeft = scrollContainer.scrollLeft;
      const maxScrollLeft = scrollContainer.scrollWidth - scrollContainer.clientWidth;

      // Hide or show left arrow
      if (scrollLeft <= 0) {
        prevBtn.style.display = 'none';
      } else {
        prevBtn.style.display = 'flex';
      }

      // Hide or show right arrow
      if (scrollLeft >= maxScrollLeft - 10) {
        nextBtn.style.display = 'none';
      } else {
        nextBtn.style.display = 'flex';
      }
    }

    // Scroll button actions
    prevBtn.addEventListener('click', () => {
      scrollContainer.scrollBy({ left: -300, behavior: 'smooth' });
    });

    nextBtn.addEventListener('click', () => {
      scrollContainer.scrollBy({ left: 300, behavior: 'smooth' });
    });

    // Update arrow visibility when scrolling
    scrollContainer.addEventListener('scroll', updateArrowVisibility);

    // Initial check (in case already at start or end)
    updateArrowVisibility();
  });
</script>


<section class="bg-[#FFFFFD] py-12 px-4 md:px-8 font-poppins relative">
  <div class="max-w-7xl mx-auto">

    {{-- Section Title --}}
    <h2 class="text-[#021908] text-2xl md:text-3xl font-bold text-center mb-8">
      Recommended Apartments
    </h2>

    {{-- Arrows --}}
    <button id="prevBtn" class="hidden md:flex absolute left-2 top-[55%] transform -translate-y-1/2 z-10 bg-[#BBCB2F] text-[#021908] p-2 rounded-full shadow hover:bg-[#FEFA95] transition">
      <i data-lucide="chevron-left" class="w-5 h-5"></i>
    </button>

    <button id="nextBtn" class="hidden md:flex absolute right-2 top-[55%] transform -translate-y-1/2 z-10 bg-[#BBCB2F] text-[#021908] p-2 rounded-full shadow hover:bg-[#FEFA95] transition">
      <i data-lucide="chevron-right" class="w-5 h-5"></i>
    </button>

    {{-- Slider Container --}}
    <div id="scrollContainer" class="flex gap-6 overflow-x-auto md:overflow-hidden scroll-smooth pb-4 px-1 md:px-0 no-scrollbar">
      @for ($i = 0; $i < 15; $i++)
        <div class="min-w-[280px] max-w-[280px] bg-[#FEFA95]/10 rounded-2xl shadow-md overflow-hidden flex flex-col transition hover:shadow-xl border border-[#BBCB2F]/40 snap-start">
          @include('components.apartment-card')
        </div>
      @endfor

      {{-- See All Button at End --}}
      <div class="min-w-[280px] max-w-[280px] flex items-center justify-center rounded-2xl text-[#021908] snap-start">
        <a href="/apartment_search">
          <button class="text-sm md:text-base text-[#021908] px-6 py-3 font-semibold hover:underline transition">
            See all apartments →
          </button>
        </a>
      </div>
    </div>

  </div>
</section>

{{-- Hide scrollbar (mobile only) --}}
<style>
  .no-scrollbar::-webkit-scrollbar {
    display: none;
  }
  .no-scrollbar {
    -ms-overflow-style: none;
    scrollbar-width: none;
  }
</style>
