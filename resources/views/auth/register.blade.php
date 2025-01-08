<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.1.2/dist/tailwind.min.css" rel="stylesheet">
    <title>Register | FAIZ</title>
    <style>
        .show-password-icon {
            cursor: pointer;
            position: absolute;
            right: 15px;
            top: 50%;
            transform: translateY(-50%);
        }
    </style>
</head>
<body class="bg-gray-50">

    <!-- Main Container -->
    <div class="container mx-auto flex justify-center items-center min-h-screen py-6 px-4">

        <!-- Register Container -->
        <div class="flex border rounded-2xl shadow-xl overflow-hidden w-full max-w-3xl bg-white">

            <!-- Left Box -->
            <div class="hidden sm:block sm:w-1/2 bg-gradient-to-r from-blue-500 to-blue-700 text-white flex flex-col justify-center items-center p-8">
                <div class="mb-6">
                    <img src="https://i.pinimg.com/736x/3c/e6/ca/3ce6ca39ed39d4e677777831a34bd365.jpg" alt="Medic Icon" class="w-24 h-24 rounded-full mb-4 shadow-lg">
                </div>
                <p class="text-4xl font-extrabold font-mono">SKILLIFY</p>
                <p class="text-xl mt-4">Pelajari dan kembangkan keterampilan Anda bersama kami!</p>
            </div>

            <!-- Right Box -->
            <div class="w-full sm:w-1/2 p-8">
                <h2 class="text-4xl font-semibold text-gray-800 mb-6">Daftar</h2>
                <form id="registerForm" method="POST" action="{{route('register')}}" onsubmit="showSuccessAlert(event)" class="space-y-6">
                    @csrf

                    <!-- Input Nama Lengkap -->
                    <div>
                        <label for="name" class="block text-gray-700 font-medium mb-2">Nama Lengkap</label>
                        <input type="text" id="name" name="name" placeholder="Masukkan nama lengkap Anda"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none"
                            required />
                        @error('name')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Input Email -->
                    <div>
                        <label for="email" class="block text-gray-700 font-medium mb-2">Email</label>
                        <input type="email" id="email" name="email" placeholder="Masukkan email Anda"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none"
                            required />
                        @error('email')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Input Password -->
                    <div class="relative">
                        <label for="password" class="block text-gray-700 font-medium mb-2">Password</label>
                        <div class="flex items-center border border-gray-300 rounded-lg">
                            <input type="password" id="password" name="password" placeholder="Password"
                                class="w-full px-4 py-3 border-none rounded-lg text-sm focus:ring focus:ring-blue-500 focus:outline-none"
                                required>
                            <span class="absolute right-4 cursor-pointer" onclick="togglePasswordVisibility('password')">
                                <svg id="eye-icon-password" class="w-6 h-6 text-gray-800 hover:text-blue-500 transition-all" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M21 12c0 1.2-4.03 6-9 6s-9-4.8-9-6c0-1.2 4.03-6 9-6s9 4.8 9 6z" />
                                </svg>
                            </span>
                        </div>
                        @error('password')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Input Konfirmasi Password -->
                    <div class="relative">
                        <label for="password_confirmation" class="block text-gray-700 font-medium mb-2">Konfirmasi Password</label>
                        <div class="flex items-center border border-gray-300 rounded-lg">
                            <input type="password" id="password_confirmation" name="password_confirmation"
                                placeholder="Ulangi password Anda"
                                class="w-full px-4 py-3 border-none rounded-lg text-sm focus:ring-2 focus:ring-blue-500 focus:outline-none"
                                required />
                            <span class="absolute right-4 cursor-pointer" onclick="togglePasswordVisibility('password_confirmation')">
                                <svg id="eye-icon-password_confirmation" class="w-6 h-6 text-gray-800 hover:text-blue-500 transition-all" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M21 12c0 1.2-4.03 6-9 6s-9-4.8-9-6c0-1.2 4.03-6 9-6s9 4.8 9 6z" />
                                </svg>
                            </span>
                        </div>
                        @error('password_confirmation')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Submit Button -->
                    <div class="my-6">
                        <button type="submit" class="w-full py-3 bg-blue-500 text-white rounded-lg text-lg shadow-lg hover:bg-blue-600 transform transition-all hover:scale-105">
                            Register
                        </button>
                    </div>

                    <!-- Link to Login -->
                    <div class="text-center">
                        <small class="text-gray-600">Sudah punya akun? <a href="{{route('login_view')}}" class="text-blue-500 hover:underline">Masuk</a></small>
                    </div>
                </form>
            </div>

        </div>
    </div>

    <script>
        function togglePasswordVisibility(id) {
            const passwordInput = document.getElementById(id);
            const eyeIcon = document.getElementById("eye-icon-" + id);
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
