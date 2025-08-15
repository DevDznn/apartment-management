<section class="relative bg-[#FFFFFD] pt-14 sm:pt-16 overflow-hidden">
    <!-- Background Blobs -->
    <div aria-hidden="true" class="pointer-events-none">
        <div class="absolute -top-10 -left-10 w-64 h-64 bg-[#BBCB2F]/15 rounded-full blur-3xl"
            data-aos="fade-right"
            data-aos-delay="0"
            data-aos-duration="800"></div>
        <div class="absolute -bottom-12 -right-10 w-72 h-72 bg-[#D3E6D6]/25 rounded-full blur-3xl"
            data-aos="fade-left"
            data-aos-delay="150"
            data-aos-duration="800"></div>
    </div>

    <div class="relative z-10 max-w-7xl mx-auto px-6 sm:px-10">
        <!-- Header -->
        <header class="text-center"
            data-aos="fade-up"
            data-aos-delay="300"
            data-aos-duration="800">
            <h1 class="text-2xl sm:text-2xl md:text-3xl font-extrabold text-[#021908] tracking-tight">
                Welcome, Landlords!
            </h1>
            <p class="mt-3 text-[#021908]/80 text-base max-w-3xl mx-auto leading-relaxed">
                List your apartment and connect with verified tenants across all 18 barangays in Santa Rosa City.
                Enjoy seamless management, updates, and secure listings—everything in one platform built for speed, safety, and clarity.
            </p>
        </header>

        <!-- Feature Cards -->
        <div class="mt-10 grid grid-cols-1 sm:grid-cols-3 gap-6">
            @foreach([
            ['title'=>'Fast Reach','desc'=>'Your listings surface quickly to vetted tenants across the city. Smart search and filters help the right people find your property in seconds—no clutter, no guesswork.','icon'=>'
            <path d="M12 2v4M2 12h4M18 12h4M12 18v4M5 5l3 3M16 16l3 3M16 8l3-3M5 19l3-3" />'],
            ['title'=>'Secure Data','desc'=>'We prioritize privacy. Account details and listing information are handled using robust security practices, so you can focus on managing units—not managing risk.','icon'=>'
            <path d="M12 22s8-4 8-10V7l-8-5-8 5v5c0 6 8 10 8 10z" />
            <path d="M9 12a3 3 0 1 0 6 0 3 0 0 0-6 0z" />'],
            ['title'=>'Simple Management','desc'=>'Create, update, and organize multiple listings with ease. Track inquiries, see status updates, and keep everything in one tidy dashboard—mobile-friendly and intuitive.','icon'=>'
            <rect x="3" y="3" width="7" height="7" rx="1" />
            <rect x="14" y="3" width="7" height="7" rx="1" />
            <rect x="14" y="14" width="7" height="7" rx="1" />
            <rect x="3" y="14" width="7" height="7" rx="1" />']
            ] as $i => $card)
            <article class="bg-[#FFFFFD] border border-gray-200 rounded-xl p-6 shadow-sm hover:shadow-lg hover:border-[#BBCB2F] transition-all duration-300"
                data-aos="fade-up"
                data-aos-delay="{{ 500 + ($i * 150) }}"
                data-aos-duration="800">
                <div class="flex items-start gap-3">
                    <svg class="w-8 h-8 shrink-0 text-[#021908]" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                        {!! $card['icon'] !!}
                    </svg>
                    <div>
                        <h3 class="text-base font-semibold text-[#021908]">{{ $card['title'] }}</h3>
                        <p class="mt-1 text-sm text-[#021908]/80">{{ $card['desc'] }}</p>
                    </div>
                </div>
            </article>
            @endforeach
        </div>

        <!-- CTAs -->
        <div class="mt-8 flex flex-col sm:flex-row justify-center gap-3"
            data-aos="zoom-in"
            data-aos-delay="1000"
            data-aos-duration="800">
            <a href="/login_landlord"
                class="px-6 py-2.5 rounded-l bg-[#021908] text-[#FFFFFD] text-sm font-semibold flex items-center justify-center gap-2 hover:bg-[#BBCB2F] transition-colors shadow">
                🏠 Login
            </a>
            <a href="/register_landlord"
                class="px-6 py-2.5 rounded-l bg-[#BBCB2F] text-[#021908] text-sm font-semibold flex items-center justify-center gap-2 hover:bg-[#021908] hover:text-[#FFFFFD] transition-colors shadow">
                📝 Register
            </a>
        </div>

        <!-- Barangay Logos -->
        <section class="mt-8">
            <h2 class="text-xl sm:text-2xl font-bold text-[#021908] text-center"
                data-aos="fade-up"
                data-aos-duration="800">
                Santa Rosa City Barangays
            </h2>
            <p class="mt-2 text-base text-[#021908]/80 max-w-3xl mx-auto text-center leading-relaxed"
                data-aos="fade-up"
                data-aos-duration="800">
                These icons represent the <span class="font-semibold text-[#021908]">18 barangays</span> of Santa Rosa City. They help tenants and landlords quickly spot listings by location, identify service areas, and build trust with recognizable local seals.
            </p>

            <div class="mt-6 grid grid-cols-3 sm:grid-cols-6 lg:grid-cols-9 gap-4 justify-items-center">
                @foreach(['aplaya','balibago','caingin','dila','dita','donjose','ibaba','kanluran','labas','macabling','malitlit','malusak','market','pooc','pulongsantacruz','stodomingo','sinalhan','tagapo'] as $index => $logo)
                <figure class="flex flex-col items-center gap-2 hover:scale-105 transition-transform duration-300"
                    data-aos="fade-up"
                    data-aos-delay="{{ $index * 50 }}"
                    data-aos-duration="600">
                    <img src="/images/barangay/{{ $logo }}.png" alt="Barangay {{ ucfirst($logo) }} official seal" class="h-12 w-12 sm:h-14 sm:w-14 object-contain" loading="lazy" />
                    <figcaption class="text-[11px] sm:text-xs text-[#021908]/80">{{ ucfirst($logo) }}</figcaption>
                </figure>
                @endforeach
            </div>
        </section>

    </div>
</section>