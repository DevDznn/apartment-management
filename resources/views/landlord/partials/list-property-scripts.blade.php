<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"/>
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const mapboxToken = "pk.eyJ1IjoiZHpubjIwIiwiYSI6ImNtZTk5cGozajAxOHIyaXNpZThlNXZzMWsifQ.HOQJlr10_v2H4nHf6snmsQ";
    const latInput = document.getElementById('latitude');
    const lngInput = document.getElementById('longitude');

    const initialLat = parseFloat(latInput.value);
    const initialLng = parseFloat(lngInput.value);

    const map = L.map('propertyMap').setView([initialLat, initialLng], 15);

    L.tileLayer(`https://api.mapbox.com/styles/v1/mapbox/streets-v11/tiles/256/{z}/{x}/{y}@2x?access_token=${mapboxToken}`, {
        tileSize: 512,
        zoomOffset: -1,
        attribution: '© <a href="https://www.mapbox.com/">Mapbox</a> | © <a href="https://www.openstreetmap.org/">OpenStreetMap</a>'
    }).addTo(map);

    const marker = L.marker([initialLat, initialLng], { draggable: true }).addTo(map);

    marker.on('dragend', function(e) {
        const { lat, lng } = marker.getLatLng();
        latInput.value = lat.toFixed(6);
        lngInput.value = lng.toFixed(6);
    });

    map.on('click', function(e) {
        marker.setLatLng(e.latlng);
        latInput.value = e.latlng.lat.toFixed(6);
        lngInput.value = e.latlng.lng.toFixed(6);
    });

    setTimeout(() => map.invalidateSize(), 200);
});
</script>
