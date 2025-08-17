<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tenant Sign Up</title>

    <!-- Tailwind CSS -->
    @vite('resources/css/app.css')
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

<body class="relative min-h-screen bg-[#FFFFFD] px-4 overflow-y-auto">
    @include('components.back-button')

    <!-- Background Blobs -->
    <div class="absolute top-0 left-0 w-64 h-64 bg-[#BBCB2F]/20 rounded-full blur-3xl"></div>
    <div class="absolute bottom-0 right-0 w-72 h-72 bg-[#D3E6D6]/30 rounded-full blur-3xl"></div>

    <div class="flex justify-center pt-20 sm:pt-24 relative z-10 pb-10">
        <div class="bg-[#FFFFFD] shadow-lg rounded-lg p-6 sm:p-8 w-full max-w-lg border border-[#BBCB2F]/30 animate-fadeInUp relative z-10">
            <!-- Title -->
            <h2 class="text-2xl font-bold text-center text-[#021908]">Create Your Account</h2>
            <p class="text-sm text-center text-[#021908]/80 mt-2">Sign up to see available apartments</p>

            <!-- Form -->
            <form action="" method="POST" class="mt-6 space-y-4">
                @csrf

                <!-- First & Last Name -->
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                    <div>
                        <label for="first_name" class="block text-sm font-medium text-[#021908]">First Name</label>
                        <input type="text" name="first_name" id="first_name"
                            class="mt-1 w-full px-4 py-2 border border-gray-300 rounded-lg text-sm 
                               focus:outline-none focus:ring-2 focus:ring-[#BBCB2F] bg-white"
                            required>
                    </div>
                    <div>
                        <label for="last_name" class="block text-sm font-medium text-[#021908]">Last Name</label>
                        <input type="text" name="last_name" id="last_name"
                            class="mt-1 w-full px-4 py-2 border border-gray-300 rounded-lg text-sm 
                               focus:outline-none focus:ring-2 focus:ring-[#BBCB2F] bg-white"
                            required>
                    </div>
                </div>

                <!-- Email & Contact -->
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                    <div>
                        <label for="email" class="block text-sm font-medium text-[#021908]">Email</label>
                        <input type="email" name="email" id="email"
                            class="mt-1 w-full px-4 py-2 border border-gray-300 rounded-lg text-sm 
                               focus:outline-none focus:ring-2 focus:ring-[#BBCB2F] bg-white"
                            required>
                    </div>
                    <div>
                        <label for="contact_number" class="block text-sm font-medium text-[#021908]">Contact Number</label>
                        <input type="tel" name="contact_number" id="contact_number"
                            class="mt-1 w-full px-4 py-2 border border-gray-300 rounded-lg text-sm 
                               focus:outline-none focus:ring-2 focus:ring-[#BBCB2F] bg-white"
                            required>
                    </div>
                </div>

                <!-- Password & Confirm Password -->
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                    <div>
                        <label for="password" class="block text-sm font-medium text-[#021908]">Password</label>
                        <div class="relative mt-1 group">
                            <input type="password" name="password" id="password"
                                class="w-full px-4 py-2 pr-10 border border-gray-300 rounded-lg text-sm 
                                   focus:outline-none focus:ring-2 focus:ring-[#BBCB2F] bg-white"
                                required>
                            <span class="absolute top-1/2 right-3 -translate-y-1/2 cursor-pointer opacity-0 group-hover:opacity-100 group-focus-within:opacity-100 transition-opacity duration-200" id="togglePassword">
                                <x-eye-icon />

                            </span>
                        </div>
                    </div>
                    <div>
                        <label for="confirm_password" class="block text-sm font-medium text-[#021908]">Confirm Password</label>
                        <div class="relative mt-1 group">
                            <input type="password" name="confirm_password" id="confirm_password"
                                class="w-full px-4 py-2 pr-10 border border-gray-300 rounded-lg text-sm 
                                   focus:outline-none focus:ring-2 focus:ring-[#BBCB2F] bg-white"
                                required>
                            <span class="absolute top-1/2 right-3 -translate-y-1/2 cursor-pointer opacity-0 group-hover:opacity-100 group-focus-within:opacity-100 transition-opacity duration-200" id="toggleConfirm">
                                <x-eye-icon />

                            </span>
                        </div>
                    </div>
                </div>

                <!-- Submit -->
                <button type="submit"
                    class="w-full bg-[#BBCB2F] hover:bg-[#a6b529] transition-colors text-white font-semibold py-2.5 rounded-lg text-sm shadow-md">
                    Sign Up
                </button>

                <!-- OR Divider -->
                <div class="flex items-center my-4">
                    <hr class="flex-grow border-gray-300">
                    <span class="px-3 text-gray-500 text-sm">OR</span>
                    <hr class="flex-grow border-gray-300">
                </div>

                <!-- Google Button -->
                <a href="#"
                    class="flex items-center justify-center gap-2 border border-gray-300 py-2.5 rounded-lg hover:bg-gray-50 transition">
                    <img src="https://www.svgrepo.com/show/355037/google.svg" class="w-5 h-5" alt="Google logo">
                    <span class="text-sm font-medium text-gray-700">Sign up with Google</span>
                </a>
            </form>

            <!-- Login Link -->
            <p class="text-sm text-center mt-5 text-[#021908]/70">
                Already have an account?
                <a href="/login_tenant" class="text-[#BBCB2F] font-medium hover:underline">Login</a>
            </p>
        </div>

    </div>


    <!-- Password Toggle Script -->
    <script>
        const togglePassword = document.getElementById('togglePassword');
        const toggleConfirm = document.getElementById('toggleConfirm');
        const passwordInput = document.getElementById('password');
        const confirmInput = document.getElementById('confirm_password');
        togglePassword.addEventListener('click', () => {
            passwordInput.type = passwordInput.type === 'password' ? 'text' : 'password';
        });
        toggleConfirm.addEventListener('click', () => {
            confirmInput.type = confirmInput.type === 'password' ? 'text' : 'password';
        });
    </script>

</body>

</html>