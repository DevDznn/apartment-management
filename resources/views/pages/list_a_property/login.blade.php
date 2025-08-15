<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Landlord Login</title>

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        /* Fade & scale animation */
        @keyframes fadeInUp {
            0% {
                opacity: 0;
                transform: translateY(20px) scale(0.98);
            }
            100% {
                opacity: 1;
                transform: translateY(0) scale(1);
            }
        }
        .animate-fadeInUp {
            animation: fadeInUp 0.5s ease-out forwards;
        }
    </style>
</head>

<body class="relative min-h-screen flex items-center justify-center bg-[#FFFFFD] px-4 overflow-hidden">
    @include('components.back-button')

    <!-- Background Blobs -->
    <div class="absolute top-0 left-0 w-64 h-64 bg-[#BBCB2F]/20 rounded-full blur-3xl"></div>
    <div class="absolute bottom-0 right-0 w-72 h-72 bg-[#D3E6D6]/30 rounded-full blur-3xl"></div>

    <div class="bg-[#FFFFFD] shadow-lg rounded-lg p-6 sm:p-8 w-full max-w-xs sm:max-w-sm border border-[#BBCB2F]/30 animate-fadeInUp relative z-10">
        <!-- Title -->
        <h2 class="text-2xl font-bold text-center text-[#021908]">Landlord Login</h2>
        <p class="text-sm text-center text-[#021908]/80 mt-2">Enter your credentials to access your account</p>

        <!-- Form -->
        <form action="" method="POST" class="mt-6 space-y-4">
            @csrf

            <!-- Email -->
            <div>
                <label for="email" class="block text-sm font-medium text-[#021908]">Email</label>
                <input 
                    type="email" 
                    name="email" 
                    id="email" 
                    value="{{ old('email') }}"
                    class="mt-1 w-full px-4 py-2 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-[#BBCB2F] focus:border-transparent bg-white"
                    required
                >
            </div>

            <!-- Password -->
            <div>
                <label for="password" class="block text-sm font-medium text-[#021908]">Password</label>
                <div class="relative mt-1 group">
                    <input 
                        type="password" 
                        name="password" 
                        id="password"
                        class="w-full px-4 py-2 pr-10 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-[#BBCB2F] focus:border-transparent bg-white"
                        required
                    >
                    <!-- Eye Toggle -->
                    <span class="absolute top-1/2 right-3 -translate-y-1/2 cursor-pointer  opacity-0 group-hover:opacity-100 group-focus-within:opacity-100 transition-opacity duration-200" id="togglePassword">
                        <x-eye-icon/>
                    </span>
                </div>
            </div>

            <!-- Remember & Forgot -->
            <div class="flex items-center justify-between text-sm">
                <label class="flex items-center text-[#021908]">
                    <input type="checkbox" name="remember" class="h-4 w-4 mr-2 text-[#BBCB2F] border-gray-300 rounded">
                    Remember me
                </label>
                <a href="#" class="text-[#BBCB2F] font-medium hover:underline">Forgot Password?</a>
            </div>

            <!-- Submit -->
            <button type="submit" class="w-full bg-[#BBCB2F] hover:bg-[#a6b529] transition-colors text-white font-semibold py-2.5 rounded-lg text-sm shadow-md">
                Login
            </button>
        </form>

        <!-- Signup Link -->
        <p class="text-sm text-center mt-5 text-[#021908]/70">
            Don't have an account? 
            <a href="/register_landlord" class="text-[#BBCB2F] font-medium hover:underline">Sign up</a>
        </p>
    </div>

    <!-- Password Toggle Script -->
    <script>
        const togglePassword = document.getElementById('togglePassword');
        const passwordInput = document.getElementById('password');

        togglePassword.addEventListener('click', () => {
            const type = passwordInput.type === 'password' ? 'text' : 'password';
            passwordInput.type = type;
        });
    </script>
</body>

</html>
