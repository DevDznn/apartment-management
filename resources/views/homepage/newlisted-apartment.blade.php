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
          @include('components.apartment-card')

          {{-- Content --}}
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
