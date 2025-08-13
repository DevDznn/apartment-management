lucide.createIcons();

mapboxgl.accessToken = 'pk.eyJ1IjoiZHpubjIwIiwiYSI6ImNtZTk5cGozajAxOHIyaXNpZThlNXZzMWsifQ.HOQJlr10_v2H4nHf6snmsQ';

const apartmentLatLng = [121.1105, 14.2916];
let userLatLng = null;
let userMarker = null;
let tracking = false;

const map = new mapboxgl.Map({
  container: 'map',
  style: 'mapbox://styles/mapbox/streets-v12',
  center: apartmentLatLng,
  zoom: 15
});

const directions = new MapboxDirections({
  accessToken: mapboxgl.accessToken,
  unit: 'metric',
  profile: 'mapbox/driving',
  interactive: false
});

// Maneuver type to icon mapping
const maneuverIcons = {
  'turn-left': 'arrow-left',
  'turn-right': 'arrow-right',
  'merge': 'merge',
  'roundabout': 'refresh-cw',
  'roundabout-left': 'refresh-ccw',
  'roundabout-right': 'refresh-cw',
  'depart': 'map-pin',
  'arrive': 'flag',
  'end': 'flag',
  'continue': 'arrow-up',
  'slight-left': 'arrow-left-circle',
  'slight-right': 'arrow-right-circle',
  'uturn': 'undo'
};

// Apartment marker popup content with styled button
const popupContent = `
  <div class="p-3 text-center">
    <b class="text-[#021908] text-lg">Apartment Location</b><br>
    <button 
      id="start-route" 
      class="bg-[#BBCB2F] text-[#021908] font-semibold rounded-full px-5 py-2 mt-4 shadow-lg hover:bg-[#021908] hover:text-[#BBCB2F] transition flex items-center justify-center gap-2 w-full">
      <i data-lucide="navigation" class="w-5 h-5"></i> Start Navigation
    </button>
  </div>
`;

new mapboxgl.Marker({ color: '#BBCB2F' })
  .setLngLat(apartmentLatLng)
  .setPopup(new mapboxgl.Popup().setHTML(popupContent))
  .addTo(map);

function startLiveTracking() {
  map.addControl(directions, 'top-left');

  navigator.geolocation.watchPosition(pos => {
    userLatLng = [pos.coords.longitude, pos.coords.latitude];
    const heading = pos.coords.heading || 0;

    if (!userMarker) {
      userMarker = new mapboxgl.Marker({ color: '#021908' })
        .setLngLat(userLatLng)
        .setPopup(new mapboxgl.Popup().setHTML("<b class='text-[#021908]'>You are here</b>"))
        .addTo(map);
    } else {
      userMarker.setLngLat(userLatLng);
    }

    directions.setOrigin(userLatLng);
    directions.setDestination(apartmentLatLng);

    map.easeTo({
      center: userLatLng,
      zoom: 18,
      bearing: heading,
      pitch: 60,
      duration: 1000
    });

  }, err => {
    console.error("Error getting position:", err);
  }, { enableHighAccuracy: true });
}

// Start route on button click inside popup
map.on('click', () => {
  setTimeout(() => {
    const btn = document.getElementById("start-route");
    if (btn && !tracking) {
      btn.onclick = () => {
        tracking = true;
        startLiveTracking();
        btn.style.display = 'none';
      };
    }
  }, 100);
});

// Expand/collapse route panel on summary click
const routePanel = document.getElementById('route-panel');
const routeSummary = document.getElementById('route-summary');
const toggleIcon = document.getElementById('toggle-icon');
const directionsList = document.getElementById('directions-list');

// Initialize with collapsed
function collapsePanel() {
  routePanel.classList.remove('expanded');
  routePanel.classList.add('collapsed');
  toggleIcon.setAttribute('data-lucide', 'chevron-up');
  lucide.createIcons();
}
function expandPanel() {
  routePanel.classList.add('expanded');
  routePanel.classList.remove('collapsed');
  toggleIcon.setAttribute('data-lucide', 'chevron-down');
  lucide.createIcons();
}

routeSummary.addEventListener('click', () => {
  if(routePanel.classList.contains('collapsed')) {
    expandPanel();
  } else {
    collapsePanel();
  }
});

// Route updates: show panel and fill info
directions.on('route', e => {
  if (e.route && e.route.length > 0) {
    const distanceKm = (e.route[0].distance / 1000).toFixed(2);
    const durationMin = (e.route[0].duration / 60).toFixed(1);

    routePanel.classList.remove('hidden');
    collapsePanel();

    document.getElementById('distance').textContent = `${distanceKm} km`;
    document.getElementById('duration').textContent = `${durationMin} mins`;

    const steps = e.route[0].legs[0].steps;
    directionsList.innerHTML = '';

    steps.forEach(step => {
      const iconName = maneuverIcons[step.maneuver.type] || 'navigation';
      const li = document.createElement('li');
      li.className = 'flex items-center gap-3';

      li.innerHTML = `
        <i data-lucide="${iconName}" class="w-5 h-5 text-[#021908] flex-shrink-0"></i>
        <span>${step.maneuver.instruction}</span>
      `;

      directionsList.appendChild(li);
    });

    lucide.createIcons();
  }
});
