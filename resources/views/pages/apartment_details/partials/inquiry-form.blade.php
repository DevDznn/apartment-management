<div class="w-full max-w-full md:max-w-md px-4 md:px-0 mx-auto">
  <div class="flex items-center mb-6">
    <div
      class="bg-[#BBCB2F] text-[#021908] rounded-full w-12 h-12 flex items-center justify-center mr-4 shadow-md"
      aria-hidden="true"
    >
      <i data-lucide="message-square" class="w-6 h-6"></i>
    </div>
    <h3 class="text-3xl font-extrabold text-[#021908]">Send Inquiry</h3>
  </div>

  <!-- Form with grow to fill space -->
  <form class="flex flex-col gap-4 mb-6 w-full flex-grow">
    <input
      type="text"
      placeholder="Your Name"
      class="p-3 rounded-md border border-[#BBCB2F] bg-white text-[#021908] placeholder-[#AABF28] focus:outline-none focus:ring-2 focus:ring-[#BBCB2F] transition w-full"
      required
    />
    <input
      type="email"
      placeholder="Your Email"
      class="p-3 rounded-md border border-[#BBCB2F] bg-white text-[#021908] placeholder-[#AABF28] focus:outline-none focus:ring-2 focus:ring-[#BBCB2F] transition w-full"
      required
    />
    <textarea
      rows="4"
      placeholder="Your Message"
      class="p-3 rounded-md border border-[#BBCB2F] bg-white text-[#021908] placeholder-[#AABF28] focus:outline-none focus:ring-2 focus:ring-[#BBCB2F] transition resize-none w-full"
      required
    ></textarea>
    <button
      type="submit"
      class="bg-[#BBCB2F] hover:bg-[#AABF28] text-[#021908] py-3 rounded-md font-semibold transition w-full"
    >
      Submit
    </button>
  </form>

  <!-- Messaging options pushed to bottom -->
  <div class="mt-auto">
    <h4 class="text-lg font-semibold mb-5 text-[#021908]">Prefer to message via:</h4>
    <div class="flex gap-5 flex-wrap items-center">
      <button
        type="button"
        class="bg-[#BBCB2F] text-[#021908] p-3 rounded-full font-semibold shadow-sm hover:bg-[#AABF28] transition duration-300 flex items-center justify-center w-12 h-12"
        aria-label="Message in App"
      >
        <i data-lucide="message-square" class="w-6 h-6"></i>
      </button>
      <a
        href="#"
        class="bg-blue-600 text-white p-3 rounded-full font-semibold shadow-sm hover:bg-blue-700 transition duration-300 flex items-center justify-center w-12 h-12"
        aria-label="Facebook"
      >
        <i data-lucide="facebook" class="w-6 h-6"></i>
      </a>
      <a
        href="#"
        class="bg-gradient-to-r from-pink-500 to-yellow-500 text-white p-3 rounded-full font-semibold shadow-sm hover:from-pink-600 hover:to-yellow-600 transition duration-300 flex items-center justify-center w-12 h-12"
        aria-label="Instagram"
      >
        <i data-lucide="instagram" class="w-6 h-6"></i>
      </a>
    </div>
  </div>
</div>
