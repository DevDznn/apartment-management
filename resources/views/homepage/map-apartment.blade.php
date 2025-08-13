{{-- Include Leaflet and MarkerCluster CSS --}}
<link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
<link rel="stylesheet" href="https://unpkg.com/leaflet.markercluster/dist/MarkerCluster.css" />
<link rel="stylesheet" href="https://unpkg.com/leaflet.markercluster/dist/MarkerCluster.Default.css" />

<section class="bg-[#FFFFFD] font-poppins">
  <div class="max-w-7xl mx-auto px-4 py-12">
    <h2 class="text-[#021908] text-2xl md:text-3xl font-bold text-center mb-6">
      Map of Listed Apartments
    </h2>

    <div id="apartmentMap" class="w-full z-0 h-[600px] rounded-xl border border-[#BBCB2F]/40 shadow-md"></div>
  </div>
</section>

{{-- Include Leaflet and MarkerCluster JS --}}
<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
<script src="https://unpkg.com/leaflet.markercluster/dist/leaflet.markercluster.js"></script>

<script>
  document.addEventListener("DOMContentLoaded", function () {
    const map = L.map('apartmentMap').setView([14.3121, 121.1114], 13); // Initial view: Santa Rosa

    // Custom tile layer
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
      attribution: '&copy; OpenStreetMap contributors'
    }).addTo(map);

    // Apartment data
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
      {
        name: "Urban Loft",
        lat: 14.2988,
        lng: 121.1072,
        price: "₱10,500",
        location: "Pulong Santa Cruz",
        image: "https://source.unsplash.com/400x300/?apartment,urban"
      },
      {
        name: "Family Suite",
        lat: 14.3204,
        lng: 121.1250,
        price: "₱18,000",
        location: "Malitlit, Santa Rosa",
        image: "https://source.unsplash.com/400x300/?apartment,family"
      }
    ];

    // Custom green house icon (matching your palette #021908)
    const customIcon = L.icon({
      iconUrl: "https://cdn-icons-png.flaticon.com/512/69/69524.png",
      iconSize: [30, 30],
      iconAnchor: [15, 30],
      popupAnchor: [0, -28]
    });

    // Use marker clustering
    const markers = L.markerClusterGroup();

    apartments.forEach((apt) => {
      const popup = `
        <div style="max-width: 240px; font-family: sans-serif; border-radius: 12px; overflow: hidden; border: 1px solid #BBCB2F60; box-shadow: 0 2px 10px rgba(0,0,0,0.1);">
          <img src="${apt.image}" alt="Apartment Image" style="width: 100%; height: 140px; object-fit: cover;">
          <div style="padding: 12px; background-color: #FEFA9510;">
            <p style="font-size: 15px; font-weight: bold; color: #021908; margin-bottom: 4px;">
              ${apt.price}
            </p>
            <p style="font-size: 13px; color: #021908A0;">
              🏠 ${apt.location}
            </p>
          </div>
        </div>
      `;

      const marker = L.marker([apt.lat, apt.lng], { icon: customIcon })
        .bindPopup(popup)
        .on("click", () => {
          map.flyTo([apt.lat, apt.lng], 15, {
            animate: true,
            duration: 1.2
          });
        });

      markers.addLayer(marker);
    });

    map.addLayer(markers);
  });
</script>
