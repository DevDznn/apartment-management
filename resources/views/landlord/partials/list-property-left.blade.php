<div class="space-y-4">
    <x-form.input label="Monthly Rent" id="monthlyRent" type="number" placeholder="₱0.00"/>
    
    <x-form.select label="Apartment Type" id="apartmentType" :options="['Choose Type', 'Studio', '1-Bedroom', '2-Bedroom']"/>
    
    <x-form.input label="Capacity" id="capacity" type="number" placeholder="Number of tenants"/>

    <!-- Amenities & Features -->
    <div>
        <label class="block mb-1 font-medium text-[#021908]">Amenities & Features</label>
        <div class="grid grid-cols-2 gap-2">
            @foreach (["WiFi/Internet","Parking","Aircon","Furnished","Kitchen","Laundry Area","Study Room","Security","CCTV","Utilities"] as $feature)
                <label class="flex items-center gap-2 text-gray-700">
                    <input type="checkbox" class="w-4 h-4 text-[#BBCB2F] border-gray-300 rounded"/> {{ $feature }}
                </label>
            @endforeach
        </div>
    </div>

    <!-- Terms & Payment -->
    <x-form.input placeholder="Advance Payment"/>
    <x-form.input placeholder="Security Deposit"/>
    <x-form.input placeholder="Minimum Stay"/>

    <x-form.textarea label="Description" rows="4"/>
    <x-form.input label="Facebook Link" placeholder="https://facebook.com/..."/>
    <x-form.input label="Instagram Link" placeholder="https://instagram.com/..."/>
    <x-form.input label="Contact Number" placeholder="+63..."/>
</div>
