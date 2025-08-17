<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Landlord Guide & Listing</title>

    <!-- Tailwind CSS -->
    @vite('resources/css/app.css')
    <!-- Lucide Icons -->
    <script src="https://unpkg.com/lucide@latest"></script>
    <!-- AlpineJS -->
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    <!-- AOS (Animate On Scroll) -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">


    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/landlord-guide.css') }}">
</head>

<body>
    @include('components.navbar')

    <section class="py-12" style="font-family: sans-serif;">
        @include('pages.list_a_property.partials.welcome')
        @include('pages.list_a_property.partials.guide')
    </section>

    @include('components.footer')

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            lucide.createIcons();
        });
    </script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({
            duration: 800, // animation speed
            once: false // only animate once
        });
    </script>
</body>

</html>