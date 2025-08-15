{{-- resources/views/landlord-register.blade.php --}}
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Landlord Registration</title>

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
</head>

<body class="relative min-h-screen flex items-center justify-center bg-[#FFFFFD] px-4 overflow-hidden">
    @include('components.back-button')

    <!-- Background Blobs -->
    <div class="absolute top-0 left-0 w-64 h-64 bg-[#BBCB2F]/20 rounded-full blur-3xl"></div>
    <div class="absolute bottom-0 right-0 w-72 h-72 bg-[#D3E6D6]/30 rounded-full blur-3xl"></div>

    <div 
        class="bg-[#FFFFFD] shadow-lg rounded-lg p-6 sm:p-8 w-full max-w-md border border-[#BBCB2F]/30 animate-fadeInUp relative z-10"
        x-data="{ step:1, password:'', confirmPassword:'', passwordError:'' }"
    >

        <!-- Header -->
        <h2 class="text-2xl font-bold text-center text-[#021908]">Landlord Registration</h2>
        <p class="text-sm text-center text-[#021908]/80 mt-2">
            Let’s get you all set up so you can list your properties.
        </p>

        <!-- Form -->
        <form action="" method="POST" enctype="multipart/form-data" class="mt-6 space-y-4"
            @submit="if(password !== confirmPassword){ $refs.error.innerText='Passwords do not match'; $event.preventDefault(); }">
            @csrf

            {{-- Step 1 --}}
            <div x-show="step===1" class="space-y-3 text-sm">
                <h3 class="font-bold text-base mb-1">Personal Information</h3>
                <div class="flex gap-3">
                    <div class="flex-1">
                        <label class="block text-sm mb-1 text-[#021908]">First Name</label>
                        <input type="text" name="first_name" class="w-full px-4 py-2 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-[#BBCB2F] bg-white" required>
                    </div>
                    <div class="flex-1">
                        <label class="block text-sm mb-1 text-[#021908]">Last Name</label>
                        <input type="text" name="last_name" class="w-full px-4 py-2 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-[#BBCB2F] bg-white" required>
                    </div>
                </div>
                <div>
                    <label class="block text-sm mb-1 text-[#021908]">Email</label>
                    <input type="email" name="email" class="w-full px-4 py-2 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-[#BBCB2F] bg-white" required>
                </div>
                <div>
                    <label class="block text-sm mb-1 text-[#021908]">Contact Number</label>
                    <input type="text" name="contact_number" class="w-full px-4 py-2 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-[#BBCB2F] bg-white" required>
                </div>
            </div>

            {{-- Step 2 --}}
            <div x-show="step===2" class="space-y-3 text-sm">
                <h3 class="font-bold text-base mb-1">ID & Verification</h3>
                <div>
                    <label class="block text-sm mb-1 text-[#021908]">Business Permit Number</label>
                    <input type="text" name="business_permit_number" class="w-full px-4 py-2 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-[#BBCB2F] bg-white" required>
                </div>
                <div>
                    <label class="block text-sm mb-1 text-[#021908]">Proof of Ownership</label>
                    <input type="file" name="proof_of_ownership" class="w-full text-sm" required>
                </div>
                <div>
                    <label class="block text-sm mb-1 text-[#021908]">Valid ID</label>
                    <input type="file" name="valid_id" class="w-full text-sm" required>
                </div>
            </div>

            {{-- Step 3 --}}
            <div x-show="step===3" class="space-y-3 text-sm">
                <h3 class="font-bold text-base mb-1">Credentials</h3>
                <div>
                    <label class="block text-sm mb-1 text-[#021908]">Password</label>
                    <div class="relative m-1 group]">
                        <input type="password" name="password" id="password" class="w-full px-4 py-2 pr-10 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-[#BBCB2F] bg-white" x-model="password" required>
                        <span class="absolute top-1/2 right-3 -translate-y-1/2 cursor-pointer  opacity-0 group-hover:opacity-100 group-focus-within:opacity-100 transition-opacity duration-200" id="togglePassword">
                            <x-eye-icon />
                        </span>
                    </div>
                </div>
                <div>
                    <label class="block text-sm mb-1 text-[#021908]">Confirm Password</label>
                    <div class="relative mt-1 group">
                        <input type="password" name="confirm_password" id="confirmPassword" class="w-full px-4 py-2 pr-10 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-[#BBCB2F] bg-white" x-model="confirmPassword" required>
                        <span class="absolute top-1/2 right-3 -translate-y-1/2 cursor-pointer  opacity-0 group-hover:opacity-100 group-focus-within:opacity-100 transition-opacity duration-200" id="toggleConfirm">
                            <x-eye-icon />
                        </span>
                    </div>
                </div>
                <p class="text-red-500 text-xs" x-ref="error" x-text="passwordError"></p>
            </div>

            {{-- Navigation --}}
            <div class="flex justify-between mt-4 items-center">
                <button type="button" @click="if(step>1) step--" class="bg-[#BBCB2F] hover:bg-[#a6b529] text-white font-semibold px-4 py-2 rounded-lg text-sm shadow-md" :disabled="step===1">Previous</button>
                <button type="button" @click="if(step<3) step++" x-show="step<3" class="bg-[#BBCB2F] hover:bg-[#a6b529] text-white font-semibold px-4 py-2 rounded-lg text-sm shadow-md">Next</button>
                <button type="submit" x-show="step===3" class="bg-[#BBCB2F] hover:bg-[#a6b529] text-white font-semibold px-4 py-2 rounded-lg text-sm shadow-md">Register</button>
            </div>

            {{-- Stepper --}}
            <div class="flex justify-between mt-4 text-xs">
                <template x-for="i in 3" :key="i">
                    <div class="flex-1 flex flex-col items-center">
                        <div class="w-7 h-7 rounded-full flex items-center justify-center font-bold"
                            :class="step>=i?'bg-[#BBCB2F] text-[#FFFFFD]':'bg-[#BBCB2F]/30 text-[#021908]/50'">
                            <span x-text="i"></span>
                        </div>
                        <div class="mt-1 text-xs"
                            x-text="i===1?'Personal':i===2?'ID & Verification':'Credentials'"></div>
                    </div>
                </template>
            </div>
        </form>

        <p class="text-sm text-center mt-5 text-[#021908]/70">
            Already have an account?
            <a href="/login_landlord" class="text-[#BBCB2F] font-medium hover:underline">Log in</a>
        </p>
    </div>

    <!-- Password Toggle Script -->
    <script>
        const togglePassword = document.getElementById('togglePassword');
        const toggleConfirm = document.getElementById('toggleConfirm');
        const passwordInput = document.getElementById('password');
        const confirmInput = document.getElementById('confirmPassword');

        togglePassword.addEventListener('click', () => {
            passwordInput.type = passwordInput.type === 'password' ? 'text' : 'password';
        });

        toggleConfirm.addEventListener('click', () => {
            confirmInput.type = confirmInput.type === 'password' ? 'text' : 'password';
        });
    </script>
</body>
</html>
