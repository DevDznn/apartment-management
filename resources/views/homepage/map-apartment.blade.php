{{-- Leaflet CSS & JS --}}
<link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>

<section class="bg-[#FFFFFD] font-poppins">
  <div class="max-w-7xl mx-auto px-4 py-12">
    <h2 class="text-[#021908] text-2xl md:text-3xl font-bold text-center mb-6">
      Map of Listed Apartments
    </h2>


    {{-- Map --}}
    <div id="apartmentMap" class="w-full z-0 h-[600px] rounded-xl border border-[#BBCB2F]/40 shadow-md"></div>
  </div>
</section>

<script>
  document.addEventListener("DOMContentLoaded", function () {
    const map = L.map('apartmentMap').setView([14.3121, 121.1114], 13); // Santa Rosa

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
      attribution: '&copy; <a href="https://openstreetmap.org">OpenStreetMap</a> contributors'
    }).addTo(map);

    const apartments = [
      {
        name: "Studio Apartment",
        lat: 14.3121,
        lng: 121.1114,
        price: "₱12,000",
        location: "Balibago, Santa Rosa",
        image: "https://source.unsplash.com/400x300/?apartment,studio"
      },
      {
        name: "Modern Condo",
        lat: 14.3055,
        lng: 121.1009,
        price: "₱15,500",
        location: "Tagapo, Santa Rosa",
        image: "https://source.unsplash.com/400x300/?apartment,interior"
      },
    ];

    apartments.forEach(apartment => {
      const popupContent = `
        <div style="max-width: 240px; font-family: 'Poppins', sans-serif; border-radius: 12px; overflow: hidden; box-shadow: 0 2px 10px rgba(0,0,0,0.1); border: 1px solid #BBCB2F60;">
          <img src="${apartment.image}" alt="Apartment Image" style="width: 100%; height: 140px; object-fit: cover;">
          <div style="padding: 12px; background-color: #FEFA9510;">
            <p style="font-size: 15px; font-weight: bold; color: #021908; margin-bottom: 4px;">
              ${apartment.price}
            </p>
            <p style="font-size: 13px; color: #021908A0;">
              📍 ${apartment.location}
            </p>
          </div>
        </div>
      `;

      L.marker([apartment.lat, apartment.lng])
        .addTo(map)
        .bindPopup(popupContent);
    });
  });
</script>
