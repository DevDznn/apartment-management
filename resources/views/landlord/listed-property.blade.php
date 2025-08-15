@extends('layouts.landlord')

@section('title', 'Listed Property')

@section('content')
<div class="p-4 sm:p-6 md:p-8 min-h-screen bg-[#fffffd]">
    <h1 class="text-2xl font-bold mb-6 text-[#021908]">Listed Property</h1>

    <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3">

        <!-- Example Listing 1 -->
        <div class="bg-[#FFFFFD] rounded-xl shadow hover:shadow-md transition-shadow">
            <img src="/images/modern-apartment-bg.jpg" alt="Apartment" class="rounded-t-xl w-full h-48 object-cover">
            <div class="p-4">
                <h2 class="text-lg font-bold text-[#021908]">₱12,000 / month</h2>
                <p class="text-sm text-gray-600 mt-1">Barangay Balibago</p>
                <p class="text-xs text-gray-500">123 Green St, Santa Rosa, Laguna</p>

                <div class="flex justify-between items-center mt-4">
                    <div class="flex space-x-2">
                        <!-- Admin-controlled status -->
                        <span class="text-xs font-medium px-2 py-1 rounded-full bg-green-100 text-green-700">Approved</span>
                        <!-- Landlord-controlled status -->
                        <span class="text-xs font-medium px-2 py-1 rounded-full bg-blue-100 text-blue-700">Available</span>
                    </div>
                    <button class="text-sm text-blue-600 hover:underline font-medium">Edit</button>
                </div>
            </div>
        </div>

        <!-- Example Listing 2 -->
        <div class="bg-[#FFFFFD] rounded-xl shadow hover:shadow-md transition-shadow">
            <img src="/images/modern-apartment-bg.jpg" alt="Apartment" class="rounded-t-xl w-full h-48 object-cover">
            <div class="p-4">
                <h2 class="text-lg font-bold text-[#021908]">₱8,500 / month</h2>
                <p class="text-sm text-gray-600 mt-1">Barangay Tagapo</p>
                <p class="text-xs text-gray-500">45 Sunset Blvd, Santa Rosa, Laguna</p>

                <div class="flex justify-between items-center mt-4">
                    <div class="flex space-x-2">
                        <span class="text-xs font-medium px-2 py-1 rounded-full bg-yellow-100 text-yellow-700">Pending</span>
                        <span class="text-xs font-medium px-2 py-1 rounded-full bg-gray-100 text-gray-700">Not Available</span>
                    </div>
                    <button class="text-sm text-blue-600 hover:underline font-medium">Edit</button>
                </div>
            </div>
        </div>

        <!-- Example Listing 3 -->
        <div class="bg-[#FFFFFD] rounded-xl shadow hover:shadow-md transition-shadow">
            <img src="/images/modern-apartment-bg.jpg" alt="Apartment" class="rounded-t-xl w-full h-48 object-cover">
            <div class="p-4">
                <h2 class="text-lg font-bold text-[#021908]">₱15,000 / month</h2>
                <p class="text-sm text-gray-600 mt-1">Barangay Malusak</p>
                <p class="text-xs text-gray-500">89 Oakwood Ave, Santa Rosa, Laguna</p>

                <div class="flex justify-between items-center mt-4">
                    <div class="flex space-x-2">
                        <span class="text-xs font-medium px-2 py-1 rounded-full bg-red-100 text-red-700">Rejected</span>
                        <span class="text-xs font-medium px-2 py-1 rounded-full bg-blue-100 text-blue-700">Available</span>
                    </div>
                    <button class="text-sm text-blue-600 hover:underline font-medium">Edit</button>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
