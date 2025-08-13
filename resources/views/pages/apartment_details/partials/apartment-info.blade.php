<div class="mt-8 bg-[#FFFFFD] border border-[#D3E6D6] rounded-xl p-6 shadow-sm w-full max-w-full">

    <!-- Top row: Price and Address + Actions -->
    <div class="flex justify-between items-center gap-4 flex-nowrap">
        <div class="min-w-[250px] max-w-[calc(100%-80px)]">
            <h2 class="text-2xl sm:text-3xl font-extrabold text-[#021908] mb-1 truncate">
                ₱15,000.00 <span class="text-lg font-normal">per month</span>
            </h2>
            <p class="text-[#021908]/90 text-sm font-semibold truncate">Barangay Balibago</p>
            <p class="text-[#021908]/70 text-sm mt-1 truncate">123 Sample Street, Santa Rosa, Laguna</p>
        </div>

        <div class="flex gap-4 text-[#021908]/70 flex-shrink-0">
            <button
                class="p-2 rounded-md hover:text-[#BBCB2F] hover:bg-[#BBCB2F]/20 transition flex items-center justify-center"
                title="Bookmark" aria-label="Bookmark">
                <i data-lucide="bookmark" class="w-6 h-6"></i>
            </button>
            <button
                class="p-2 rounded-md hover:text-red-500 hover:bg-red-100 transition flex items-center justify-center"
                title="Report" aria-label="Report">
                <i data-lucide="flag" class="w-6 h-6"></i>
            </button>
        </div>
    </div>


    <!-- Owner Section -->
    <div class="flex items-center gap-4 mt-6 border-t border-[#D3E6D6] pt-6">
        <div class="bg-[#BBCB2F] text-[#021908] rounded-full w-12 h-12 flex items-center justify-center shadow-md flex-shrink-0">
            <i data-lucide="user" class="w-6 h-6"></i>
        </div>
        <div>
            <p class="text-sm text-[#021908]/90">Owner</p>
            <p class="text-base font-semibold text-[#021908]">Juan Dela Cruz</p>
        </div>
    </div>

    <!-- Apartment Features Grid -->
    <div
        class="grid grid-cols-2 sm:grid-cols-4 mt-8 text-sm text-center overflow-hidden border-[#D3E6D6]/10 border rounded   text-[#021908]">
        <div class="p-2 border-[#D3E6D6] border  font-medium flex flex-col items-center justify-center">
            <i data-lucide="bed" class="inline w-5 h-5 mb-1 text-[#BBCB2F]"></i>
            Type<br />
            <span class="font-normal">Two Bedroom</span>
        </div>
        <div class="p-2 border-[#D3E6D6] border  font-medium flex flex-col items-center justify-center">
            <i data-lucide="users" class="inline w-5 h-5 mb-1 text-[#BBCB2F]"></i>
            Capacity<br />
            <span class="font-normal">4 persons</span>
        </div>
        <div class="p-2 border-[#D3E6D6] border font-medium flex flex-col items-center justify-center">
            <i data-lucide="wifi" class="inline w-5 h-5 mb-1 text-[#BBCB2F]"></i>
            Wi-Fi<br />
            <span class="font-normal">Yes</span>
        </div>
        <div class="p-2 border-[#D3E6D6] border font-medium flex flex-col items-center justify-center">
            <i data-lucide="car" class="inline w-5 h-5 mb-1 text-[#BBCB2F]"></i>
            Parking<br />
            <span class="font-normal">Yes</span>
        </div>
    </div>

    <!-- Description -->
    <div class="mt-8">
        <h3 class="text-lg font-semibold text-[#021908] mb-2">Description</h3>
        <p class="text-sm text-[#021908]/80 leading-relaxed">
            A cozy apartment perfect for small families located near the city center.
        </p>
    </div>

    <!-- Policies: Advance & Deposit -->
    <div class="mt-8 border-t border-[#D3E6D6] pt-6">
        <h3 class="text-lg font-semibold text-[#021908] mb-4">Policies</h3>
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 text-[#021908] text-sm">
            <div class="flex items-center gap-3">
                <div class="bg-[#BBCB2F] p-2 rounded-full flex items-center justify-center shadow-md">
                    <i data-lucide="dollar-sign" class="w-5 h-5 text-[#021908]"></i>
                </div>
                <div>
                    <p class="font-semibold">Advance Payment</p>
                    <p class="text-[#021908]/80">₱15,000.00</p>
                </div>
            </div>
            <div class="flex items-center gap-3">
                <div class="bg-[#BBCB2F] p-2 rounded-full flex items-center justify-center shadow-md">
                    <i data-lucide="shield" class="w-5 h-5 text-[#021908]"></i>
                </div>
                <div>
                    <p class="font-semibold">Deposit</p>
                    <p class="text-[#021908]/80">₱7,500.00</p>
                </div>
            </div>
            <div class="flex items-center gap-3 col-span-1 sm:col-span-2">
                <div class="bg-[#BBCB2F] p-2 rounded-full flex items-center justify-center shadow-md">
                    <i data-lucide="calendar" class="w-5 h-5 text-[#021908]"></i>
                </div>
                <div>
                    <p class="font-semibold">Minimum Stay</p>
                    <p class="text-[#021908]/80">6 months</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Amenities & Features -->
    <div class="mt-8">
        <h3 class="text-lg font-semibold text-[#021908] mb-3">Amenities & Features</h3>
        <ul
            class="grid grid-cols-2 sm:grid-cols-3 gap-y-2 gap-x-6 text-sm list-none text-[#021908]/90">
            <li class="flex items-center gap-2"><i data-lucide="wifi" class="w-4 h-4 text-[#BBCB2F]"></i> WiFi</li>
            <li class="flex items-center gap-2"><i data-lucide="car" class="w-4 h-4 text-[#BBCB2F]"></i> Parking</li>
            <li class="flex items-center gap-2"><i data-lucide="snowflake" class="w-4 h-4 text-[#BBCB2F]"></i> Aircon</li>
            <li class="flex items-center gap-2"><i data-lucide="sofa" class="w-4 h-4 text-[#BBCB2F]"></i> Furnished</li>
            <li class="flex items-center gap-2"><i data-lucide="utensils" class="w-4 h-4 text-[#BBCB2F]"></i> Kitchen</li>
            <li class="flex items-center gap-2"><i data-lucide="shirt" class="w-4 h-4 text-[#BBCB2F]"></i> Laundry Area</li>
            <li class="flex items-center gap-2"><i data-lucide="book" class="w-4 h-4 text-[#BBCB2F]"></i> Study Room</li>
            <li class="flex items-center gap-2"><i data-lucide="lock" class="w-4 h-4 text-[#BBCB2F]"></i> Security</li>
            <li class="flex items-center gap-2"><i data-lucide="video" class="w-4 h-4 text-[#BBCB2F]"></i> CCTV</li>
            <li class="flex items-center gap-2"><i data-lucide="plug" class="w-4 h-4 text-[#BBCB2F]"></i> Utilities Included</li>
        </ul>
    </div>
</div>