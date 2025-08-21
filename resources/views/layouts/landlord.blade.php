<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Landlord Dashboard')</title>
    @vite('resources/css/app.css')
    <script src="https://unpkg.com/lucide@latest"></script>
    @vite('resources/css/app.css')

    <style>
        /* Wave animation */
        .wave {
            display: inline-block;
            animation: wave-animation 1.5s infinite;
            transform-origin: 70% 70%;
        }

        @keyframes wave-animation {

            0%,
            60%,
            100% {
                transform: rotate(0deg);
            }

            10%,
            30% {
                transform: rotate(14deg);
            }

            20%,
            40% {
                transform: rotate(-8deg);
            }
        }
    </style>
</head>

<body class="bg-[#D3E6D6] font-sans">

    <div class="flex h-screen">

        <!-- Sidebar -->
        <aside id="sidebar"
            class="fixed md:static inset-y-0 left-0 w-64 bg-[#021908] text-[#FFFFFD] flex flex-col justify-between transform -translate-x-full md:translate-x-0 transition-transform duration-300 z-50">
            <div>
                <!-- Greeting with wave -->
                <div class="p-6 border-b border-[#BBCB2F]/30 flex flex-col gap-1">
                    <h2 class="text-lg md:text-xl font-bold text-center">Hello Landlord</h2>
                    <h2 class="text-lg md:text-xl font-bold text-center"><span class="text-[#BBCB2F]">Joe</span><span class="wave">👋</span> </h2>
                </div>


                <!-- Sidebar nav -->
                <nav class="mt-6 space-y-1">
                    @php
                    $links = [
                    ['name' => 'Listed Apartments', 'icon' => 'home', 'route' => 'landlord_dashboard/listed_property'],
                    ['name' => 'List a Property', 'icon' => 'plus-square', 'route' => 'landlord_dashboard/list_property'],
                    ['name' => 'Reported', 'icon' => 'alert-triangle', 'route' => 'landlord_dashboard/report_listing'],
                    ['name' => 'Messages', 'icon' => 'message-circle', 'route' => 'messages'],
                    ];
                    $activePage = 'Listed Apartments'; // Example active link
                    @endphp

                    @foreach($links as $link)
                    <a href="{{ url($link['route']) }}"
                        class="flex items-center gap-3 px-6 py-3 transition
       {{ Request::is($link['route']) 
           ? 'bg-[#BBCB2F] text-[#021908] font-semibold' 
           : 'hover:bg-[#BBCB2F] hover:text-[#021908]' }}">
                        <i data-lucide="{{ $link['icon'] }}" class="w-5 h-5"></i>
                        {{ $link['name'] }}
                    </a>
                    @endforeach
                </nav>
            </div>

            <!-- Logout -->
            <div class="p-6 border-t border-[#BBCB2F]/30">
                <form action="" method="POST">
                    @csrf
                    <button type="submit" class="flex items-center gap-3 w-full px-4 py-2 text-left hover:bg-red-500 hover:text-white transition">
                        <i data-lucide="log-out" class="w-5 h-5"></i>
                        Logout
                    </button>
                </form>
            </div>
        </aside>

        <!-- Overlay for mobile -->
        <div id="overlay" class="fixed inset-0 bg-black bg-opacity-50 hidden z-40 md:hidden"></div>

        <!-- Main Content -->
        <div class="flex-1 flex flex-col w-full">

            <!-- Topbar -->
            <header class="flex justify-between items-center bg-[#FFFFFD] px-4 md:px-6 py-3 border-b border-gray-200">
                <!-- Mobile menu button -->
                <button id="menu-btn" class="md:hidden">
                    <i data-lucide="menu" class="w-6 h-6 text-[#021908]"></i>
                </button>

                <div class="flex items-center gap-6 ml-auto">
                    <!-- Notification Icon -->
                    <button class="relative">
                        <i data-lucide="bell" class="w-6 h-6 text-[#021908]"></i>
                        <span class="absolute -top-1 -right-1 bg-red-500 text-white rounded-full text-xs px-1">3</span>
                    </button>

                    <!-- Profile Dropdown -->
                    <div class="relative group">
                        <button class="flex items-center gap-2">
                            <img src="https://ui-avatars.com/api/?name=Joe&background=BBCB2F&color=021908" alt="Profile" class="w-8 h-8 rounded-full">
                            <span class="text-[#021908] font-medium hidden sm:inline">Joe</span>
                            <i data-lucide="chevron-down" class="w-4 h-4 text-[#021908]"></i>
                        </button>
                        <div class="absolute right-0 mt-2 w-40 bg-white border rounded-lg shadow-lg hidden group-hover:block">
                            <a href="#" class="flex items-center gap-2 px-4 py-2 hover:bg-[#BBCB2F] hover:text-[#021908]">
                                <i data-lucide="edit" class="w-4 h-4"></i>
                                Edit Profile
                            </a>
                        </div>
                    </div>
                </div>
            </header>

            <!-- Page Content -->
            <main class="p-4 md:p-6 overflow-y-auto">
                @yield('content')
            </main>
        </div>
    </div>

    <script>
        lucide.createIcons();

        const sidebar = document.getElementById('sidebar');
        const overlay = document.getElementById('overlay');
        const menuBtn = document.getElementById('menu-btn');

        menuBtn.addEventListener('click', () => {
            sidebar.classList.toggle('-translate-x-full');
            overlay.classList.toggle('hidden');
        });

        overlay.addEventListener('click', () => {
            sidebar.classList.add('-translate-x-full');
            overlay.classList.add('hidden');
        });
    </script>
    @yield('scripts')

</body>

</html>