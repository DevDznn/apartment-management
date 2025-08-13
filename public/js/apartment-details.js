document.addEventListener('DOMContentLoaded', function () {

    // Map setup
    var map = L.map('map').setView([14.311385, 121.112042], 15);
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png').addTo(map);
    L.marker([14.311385, 121.112042]).addTo(map).bindPopup('Apartment Location').openPopup();

    // Gallery images (RentHop links)
    const images = [
        'https://photos.renthop.com/p/s/1024x1024/74850041_a2fd18e3becb79ef08146dab4320f18d.webp',
        'https://photos.renthop.com/p/s/1024x1024/74850041_2a63efffefde9ac0e96e6cdda82c9764.webp',
        'https://photos.renthop.com/p/s/1024x1024/74850041_5de2d9240628f92cf6d95b302f1e7b75.webp',
        'https://photos.renthop.com/p/s/1024x1024/74850041_9790daee6bd4c3a28d315b4a3027539d.webp',
        'https://photos.renthop.com/p/s/1024x1024/74850041_c6c78303448aa578e2b28527abcbbe8b.webp',
        'https://photos.renthop.com/p/s/1024x1024/74850041_776ef22d8526b4d90761975a5abac245.webp'
    ];

    const thumbnailsContainer = document.getElementById('thumbnails');
    const selectedImage = document.getElementById('selectedImage');
    let currentIndex = 0;

    function updateMainImage(index) {
        currentIndex = index;
        selectedImage.src = images[currentIndex];

        thumbnailsContainer.querySelectorAll('img').forEach((thumb, i) => {
            thumb.classList.toggle('ring-4', i === currentIndex);
            thumb.classList.toggle('ring-[#BBCB2F]', i === currentIndex);
        });

        thumbnailsContainer.children[currentIndex].scrollIntoView({
            behavior: 'smooth',
            inline: 'center',
            block: 'nearest'
        });
    }

    // Create thumbnails
    images.forEach((src, index) => {
        const thumb = document.createElement('img');
        thumb.src = src;
        thumb.className = "h-20 w-28 object-cover rounded-md cursor-pointer transition-all";
        thumb.addEventListener('click', () => updateMainImage(index));
        thumbnailsContainer.appendChild(thumb);
    });

    // Set initial image
    updateMainImage(0);

    // Initialize icons
    lucide.createIcons();

    // EVENT DELEGATION for prev/next buttons
    document.querySelector('.md\\:col-span-2').addEventListener('click', function (e) {
        if (e.target.closest('#prevBtn')) {
            e.preventDefault();
            updateMainImage((currentIndex - 1 + images.length) % images.length);
        }
        if (e.target.closest('#nextBtn')) {
            e.preventDefault();
            updateMainImage((currentIndex + 1) % images.length);
        }
    });

});
