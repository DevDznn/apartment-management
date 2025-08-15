<div class="space-y-4">
    <x-form.select label="Barangay Location" id="barangay" :options="[
        'Select Barangay','Brgy. Aplaya','Brgy. Balibago','Brgy. Caingin','Brgy. Dila','Brgy. Dita','Brgy. Don Jose','Brgy. Ibaba','Brgy. Kanluran',
        'Brgy. Labas','Brgy. Malitlit','Brgy. Malusak','Brgy. Market Area','Brgy. Pooc','Brgy. Pulong Santa Cruz','Brgy. Sinalhan','Brgy. Sto. Domingo','Brgy. Tagapo']"/>

    <div class="grid grid-cols-2 gap-2">
        <x-form.input label="Latitude" id="latitude" value="14.284"/>
        <x-form.input label="Longitude" id="longitude" value="121.112"/>
    </div>

    <x-form.input label="Detailed Location" placeholder="Street, Purok, etc."/>

    <!-- Map -->
    <div>
        <label class="block mb-1 font-medium text-[#021908]">Location on Map</label>
        <div id="propertyMap" class="w-full h-64 md:h-80 rounded-lg shadow"></div>
    </div>

    <x-form.input type="file" label="Property Images (Max: 15)" multiple/>

    <x-form.input label="Business Permit Number" placeholder="Permit No."/>
        
    <x-form.input label="Business Permit Image" type="file"/>

    <x-form.input type="file" label="Proof of Ownership"/>
</div>
