<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Login Form</title>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">

    <!-- Main Container -->
    <div class="bg-white shadow-xl rounded-xl flex flex-col md:flex-row max-w-4xl w-full overflow-hidden">

        <!-- Left Section -->
        <div class="bg-gradient-to-br from-blue-500 to-blue-700 text-white flex flex-col items-center justify-center p-8 md:w-1/2">
            <img src="https://i.pinimg.com/736x/3c/e6/ca/3ce6ca39ed39d4e677777831a34bd365.jpg"
                 alt="Medic Icon"
                 class="w-36 h-36 rounded-full mb-6 shadow-lg">
            <h2 class="text-4xl font-extrabold font-mono">SKILLIFY</h2>
            <p class="text-lg mt-3">Platform Kursus Online Terpercaya</p>
        </div>

        <!-- Right Section -->
        <div class="p-8 flex-1 bg-white">
            <header class="border-b pb-6 mb-6">
                <h2 class="text-3xl font-semibold text-gray-800">Login</h2>
                <p class="text-sm text-gray-500 mt-2">Masuk untuk melanjutkan belajar.</p>
            </header>

            <!-- Alert Messages -->
            @if(session('error'))
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-lg shadow-md mb-6" role="alert">
                <span>{{ session('error') }}</span>
            </div>
            @endif

            <!-- Login Form -->
            <form method="POST" action="{{ route('login') }}" class="space-y-6">
                @csrf

                <!-- Email Input -->
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="email" id="email" name="email" placeholder="Enter your email"
                        class="w-full mt-2 px-4 py-3 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-blue-500 focus:outline-none"
                        required>
                    @error('email')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Password Input -->
                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                    <div class="relative flex items-center mt-2">
                        <input type="password" id="password" name="password" placeholder="Enter your password"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-blue-500 focus:outline-none"
                            required>
                        <span class="absolute right-3 cursor-pointer" onclick="togglePasswordVisibility()">
                            <svg id="eye-icon" class="w-6 h-6 transition-colors duration-200 text-gray-600 hover:text-blue-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12c0 1.2-4.03 6-9 6s-9-4.8-9-6c0-1.2 4.03-6 9-6s9 4.8 9 6z" />
                            </svg>
                        </span>
                    </div>
                    @error('password')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Submit Button -->
                <button type="submit"
                    class="w-full bg-blue-500 hover:bg-blue-600 text-white py-3 rounded-lg shadow-md transition duration-200 transform hover:scale-105">
                    Login
                </button>

                <!-- Register Link -->
                <div class="text-sm text-center mt-4">
                    Belum punya akun? <a href="{{ route('register_view') }}" class="text-blue-500 hover:underline">Daftar</a>
                </div>
            </form>
        </div>
    </div>

    <!-- Script -->
    <script>
        function togglePasswordVisibility() {
            const passwordInput = document.getElementById("password");
            const eyeIcon = document.getElementById("eye-icon");
            if (passwordInput.type === "password") {
                passwordInput.type = "text";
                eyeIcon.classList.add("text-blue-500");
            } else {
                passwordInput.type = "password";
                eyeIcon.classList.remove("text-blue-500");
            }
        }
    </script>
</body>
</html>
