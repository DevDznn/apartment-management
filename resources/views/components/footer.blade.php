{{-- Lucide Icons --}}
<script src="https://unpkg.com/lucide@latest"></script>
<script>
  document.addEventListener("DOMContentLoaded", function () {
    lucide.createIcons();
  });
</script>

<footer class="bg-[#021908] text-[#FFFFFD] pt-12 pb-8 font-poppins">
  <div class="max-w-7xl mx-auto px-4 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-10">

    {{-- Get the Latest --}}
    <div>
      <h3 class="text-lg font-bold mb-2">Get the Latest</h3>
      <p class="text-sm">Follow us on Instagram</p>
      <div class="mt-3 flex items-center gap-2">
        <i data-lucide="instagram" class="w-6 h-6 text-[#BBCB2F]"></i>
        <a href="#" class="hover:underline text-sm"> @yourhandle</a>
      </div>
    </div>

    {{-- Keep in Touch --}}
    <div>
      <h3 class="text-lg font-bold mb-2">Keep in Touch</h3>
      <p class="text-sm">Like our Facebook page</p>
      <div class="mt-3 flex items-center gap-2">
        <i data-lucide="facebook" class="w-6 h-6 text-[#BBCB2F]"></i>
        <a href="#" class="hover:underline text-sm"> facebook.com/yourpage</a>
      </div>
    </div>

    {{-- Renting --}}
    <div>
      <h3 class="text-lg font-bold mb-2">Renting</h3>
      <ul class="space-y-2 text-sm mt-3">
        <li><a href="#" class="hover:underline hover:text-[#BBCB2F] transition">Browse Apartments</a></li>
        <li><a href="#" class="hover:underline hover:text-[#BBCB2F] transition">Post My Property</a></li>
        <li><a href="#" class="hover:underline hover:text-[#BBCB2F] transition">View Maps</a></li>
      </ul>
    </div>

    {{-- Quick Links --}}
    <div>
      <h3 class="text-lg font-bold mb-2">Quick Links</h3>
      <ul class="space-y-2 text-sm mt-3">
        <li><a href="#" class="hover:underline hover:text-[#BBCB2F] transition">About Us</a></li>
        <li><a href="#" class="hover:underline hover:text-[#BBCB2F] transition">Terms & Conditions</a></li>
        <li><a href="#" class="hover:underline hover:text-[#BBCB2F] transition">Privacy Policy</a></li>
        <li><a href="#" class="hover:underline hover:text-[#BBCB2F] transition">Cookies Policy</a></li>
      </ul>
    </div>
  </div>

  {{-- Bottom --}}
  <div class="mt-10 border-t border-[#FFFFFD]/10 pt-6 text-center text-sm text-[#FFFFFD]/70">
    &copy; {{ date('Y') }} Santa Rosa Apartment Finder. All rights reserved.
  </div>
</footer>
