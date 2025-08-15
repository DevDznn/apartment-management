<style>
  /* Tailwind can't directly animate shadows, so we add our own */
  @keyframes greenPulse {
    0%, 100% {
      box-shadow: 0 0 15px rgba(187, 203, 47, 0.6);
    }
    50% {
      box-shadow: 0 0 25px rgba(187, 203, 47, 0.9);
    }
  }
  .pulse-glow {
    animation: greenPulse 1.5s ease-in-out infinite;
  }
</style>

<section class="relative bg-[#FFFFFD] mt-14 overflow-hidden">
  <div class="relative z-10 max-w-7xl mx-auto px-6 sm:px-10">

    <div class="mx-auto max-w-xl sm:max-w-2xl lg:max-w-3xl">
      <h2 class="text-xl sm:text-2xl font-bold text-[#021908] text-center" data-aos="fade-up">
        Don’t have a Business Permit yet?
      </h2>
      <p class="mt-2 text-base text-[#021908]/80 max-w-2xl mx-auto text-center leading-relaxed" data-aos="fade-up" data-aos-delay="100">
        Follow these steps to register and get your permit so you can start listing your apartments officially.
      </p>

      <div class="mt-6 space-y-4">
        @foreach([
          ['icon'=>'📄','title'=>'Fill Out Online Form','desc'=>'Scan the QR code or <a href="https://santarosacity.gov.ph/business-permits/login" class="font-semibold underline text-[#021908]" target="_blank" rel="noopener">click here</a> to access the form and wait for the confirmation email.'],
          ['icon'=>'✉️','title'=>'Use Email & Account No.','desc'=>'Log in with the same email and account number to view your payment information.'],
          ['icon'=>'💳','title'=>'View Balance & Download TOP','desc'=>'Check your balance, download the Tax Order of Payment (TOP), and select the quarters to pay.'],
          ['icon'=>'🏦','title'=>'Make Your Payment','desc'=>'Pay online or over the counter. If paying OTC, upload your deposit slip for verification.'],
          ['icon'=>'✅','title'=>'Track Your Status','desc'=>'Re-enter your email and account number anytime to check your permit’s current status.']
        ] as $index => $step)
          <div 
            class="group flex items-start gap-3 sm:gap-4 bg-[#FFFFFD] border border-gray-200 rounded-xl p-4 sm:p-5 shadow-sm 
                   hover:border-[#BBCB2F] hover:scale-[1.02] hover:bg-[#FEFA95]/20
                   transition-all duration-300 ease-out cursor-pointer transform"
            data-aos="fade-up"
            data-aos-delay="{{ $index * 100 }}"
            onmouseover="this.classList.add('pulse-glow')" 
            onmouseout="this.classList.remove('pulse-glow')"
          >
            <div class="flex-shrink-0 w-8 h-8 sm:w-9 sm:h-9 rounded-full bg-[#BBCB2F] text-[#021908] font-bold flex items-center justify-center text-sm transition-transform duration-300 group-hover:rotate-6">
              {{ $index + 1 }}
            </div>
            <div class="flex-1">
              <div class="flex items-center gap-2">
                <span class="text-lg transition-transform duration-300 group-hover:translate-x-1">{!! $step['icon'] !!}</span>
                <h3 class="text-base font-semibold text-[#021908]">{{ $step['title'] }}</h3>
              </div>
              <p class="mt-1 text-sm text-[#021908]/80 leading-relaxed">{!! $step['desc'] !!}</p>
            </div>
          </div>
        @endforeach
      </div>
    </div>

  </div>
</section>
