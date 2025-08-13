<nav class="fixed top-0 left-0 w-full z-50 bg-[#021908]/50 backdrop-blur-md border-b border-white/10 text-[#FFFFFD] font-poppins transition-all duration-300">
  <div class="max-w-7xl mx-auto px-6 md:px-10 py-4 flex justify-between items-center h-20">

    {{-- Logo --}}
    <a href="/" class="flex items-center gap-2 text-xl font-semibold tracking-wide hover:text-[#BBCB2F] transition">
      <i data-lucide="home" class="w-5 h-5 text-[#BBCB2F]"></i>
      RentMe
    </a>

    {{-- Mobile Toggle --}}
    <button id="menuToggle" class="md:hidden focus:outline-none">
      <i data-lucide="menu" class="w-6 h-6 text-[#FFFFFD]"></i>
    </button>

    {{-- Menu Items --}}
    <div id="menuItems"
         class="hidden md:flex flex-col md:flex-row items-start md:items-center gap-6 absolute md:static top-full left-0 w-full md:w-auto bg-[#021908]/90 md:bg-transparent backdrop-blur-md md:backdrop-blur-none px-6 py-4 md:p-0 shadow-md md:shadow-none rounded-b-lg transition-all duration-300 ease-in-out">

      {{-- Navigation Links --}}
      <div class="flex flex-col gap-3 md:flex-row md:gap-6 w-full md:w-auto">
        <a href="/apartment" class="text-sm font-medium hover:text-[#BBCB2F] transition duration-150">
          APARTMENT
        </a>
        <a href="/registerlandlord" class="text-sm font-medium hover:text-[#BBCB2F] transition duration-150">
          LIST A PROPERTY
        </a>
      </div>

      {{-- Auth Buttons --}}
      <div class="flex flex-col md:flex-row gap-3 md:gap-4 w-full md:w-auto mt-4 md:mt-0">
        <a href="/register" class="w-full md:w-auto">
          <button class="w-full md:w-auto font-medium text-[#021908] bg-[#BBCB2F] hover:bg-[#FEFA95] transition px-5 py-2 rounded-md border border-[#BBCB2F]">
            REGISTER
          </button>
        </a>
        <a href="/login" class="w-full md:w-auto">
          <button class="w-full md:w-auto font-medium text-[#FFFFFD] border border-[#BBCB2F] hover:bg-[#BBCB2F] hover:text-[#021908] transition px-5 py-2 rounded-md">
            LOGIN
          </button>
        </a>
      </div>
    </div>

  </div>
</nav>

<script>
  document.addEventListener("DOMContentLoaded", function () {
    const menuToggle = document.getElementById('menuToggle');
    const menuItems = document.getElementById('menuItems');

    menuToggle.addEventListener('click', () => {
      menuItems.classList.toggle('hidden');
    });
  });
</script>
