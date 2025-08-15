@extends('layouts.landlord')

@section('title6' , 'Report Listing')

@section('content')
<section class="p-6 sm:p-8 bg-[#FFFFFD] min-h-screen">
  <h1 class="text-2xl font-bold text-[#021908] mb-6">Reported Listings</h1>

  <!-- Responsive Grid -->
  <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
    
    <!-- Example Report Card -->
    <div class="bg-[#FFFFFD] rounded-xl shadow hover:shadow-md transition-shadow">
      <!-- Apartment Image -->
      <img src="/images/modern-apartment-bg.jpg" alt="Apartment" class="rounded-t-xl w-full h-48 object-cover">

      <div class="p-4">
        <!-- Rent and Location -->
        <h2 class="text-lg font-bold text-[#021908]">₱12,000 / month</h2>
        <p class="text-sm text-gray-600 mt-1">Barangay Balibago</p>
        <p class="text-xs text-gray-500">123 Green St, Santa Rosa, Laguna</p>


        <!-- Report Details -->
        <div class="mt-4 p-3 bg-[#FEFA95]/30 rounded-lg border border-[#BBCB2F]/50">
          <h3 class="text-sm font-semibold text-[#021908] mb-1">Reported by: Tenant Name</h3>
          <p class="text-xs text-[#021908]/90 mb-1"><span class="font-semibold">Reason:</span> Misleading description / Fake images</p>
          <p class="text-xs text-[#021908]/80"><span class="font-semibold">Date:</span> August 15, 2025</p>
        </div>

        <!-- Action Buttons -->
        <div class="mt-3 flex gap-2">
          <button class="flex-1 py-2 bg-[#BBCB2F] text-[#021908] font-semibold rounded-xl hover:bg-[#AABB1F] transition-colors text-sm">
            View Listing
          </button>
          <button class="flex-1 py-2 bg-[#FF6B6B] text-white font-semibold rounded-xl hover:bg-[#E55A5A] transition-colors text-sm">
            Take Action
          </button>
        </div>
      </div>
    </div>

    <!-- Duplicate the card for multiple reports -->
    <div class="bg-[#FFFFFD] rounded-xl shadow hover:shadow-md transition-shadow">
      <img src="/images/modern-apartment-bg.jpg" alt="Apartment" class="rounded-t-xl w-full h-48 object-cover">
      <div class="p-4">
        <h2 class="text-lg font-bold text-[#021908]">₱15,000 / month</h2>
        <p class="text-sm text-gray-600 mt-1">Barangay Caingin</p>
        <p class="text-xs text-gray-500">45 Sunrise Ave, Santa Rosa, Laguna</p>
        <div class="mt-4 p-3 bg-[#FEFA95]/30 rounded-lg border border-[#BBCB2F]/50">
          <h3 class="text-sm font-semibold text-[#021908] mb-1">Reported by: Jane Doe</h3>
          <p class="text-xs text-[#021908]/90 mb-1"><span class="font-semibold">Reason:</span> Inaccurate rent info</p>
          <p class="text-xs text-[#021908]/80"><span class="font-semibold">Date:</span> August 14, 2025</p>
        </div>
        <div class="mt-3 flex gap-2">
          <button class="flex-1 py-2 bg-[#BBCB2F] text-[#021908] font-semibold rounded-xl hover:bg-[#AABB1F] transition-colors text-sm">
            View Listing
          </button>
          <button class="flex-1 py-2 bg-[#FF6B6B] text-white font-semibold rounded-xl hover:bg-[#E55A5A] transition-colors text-sm">
            Take Action
          </button>
        </div>
      </div>
    </div>

    <!-- Add more cards as needed -->
    
  </div>
</section>

@endsection

