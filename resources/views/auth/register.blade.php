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
<body class="bg-gray-100">

    <!----------------------- Main Container -------------------------->

    <div class="container mx-auto flex justify-center items-center min-h-screen">

        <!----------------------- Register Container -------------------------->

        <div class="flex border rounded-5 p-6 bg-white shadow-lg w-full max-w-4xl">

            <!--------------------------- Left Box ----------------------------->

            <div class="w-full sm:w-1/2 bg-blue-700 text-white rounded-l-2xl flex flex-col justify-center items-center p-6">
                <div class="mb-3">
                    <img src="https://i.pinimg.com/736x/3c/e6/ca/3ce6ca39ed39d4e677777831a34bd365.jpg" alt="Medic Icon" class="w-60 rounded-full mb-4">
                </div>
                <p class="text-2xl font-bold font-mono">SKILLIFY</p>
                <small class="font-mono text-center mt-4 text-lg">Daftar untuk Mengakses Pembelajaran Berkualitas dan Memulai Langkah Menuju Kesuksesan!</small>
            </div>

            <!-------------------- ------ Right Box ---------------------------->

            <div class="w-full sm:w-1/2 p-6">
                <div class="mb-6 border-b py-4">
                    <h2 class="text-3xl font-semibold">Daftar</h2>
                </div>

                <form id="registerForm" method="POST" action="{{route('register')}}" onsubmit="showSuccessAlert(event)" class="space-y-6">
                    @csrf
            <!-- Input Nama Lengkap -->
            <div>
                <label for="name" class="block text-gray-700 font-medium mb-2">Nama Lengkap</label>
                <input type="text" id="name" name="name" placeholder="Masukkan nama lengkap Anda"
                    class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none"
                    required />
                @error('name')
                <span class="text-red-500">{{ $message }}</span>
                @enderror
            </div>

            <!-- Input Email -->
            <div>
                <label for="email" class="block text-gray-700 font-medium mb-2">Email</label>
                <input type="email" id="email" name="email" placeholder="Masukkan email Anda"
                    class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none"
                    required />
                @error('email')
                <span class="text-red-500">{{ $message }}</span>
                @enderror
            </div>

            <!-- Input Password -->
            <div class="relative">
                <label for="password" class="block text-gray-700 font-medium mb-2">Password</label>
                <div>
                    <input type="password" id="password" name="password" placeholder="Password"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg text-sm focus:ring focus:ring-blue-500 focus:outline-none"
                    required>
                    @error('password')
                        <span class="text-red-500">{{ $message }}</span>
                   @enderror
                    <span class="absolute my-2 right-4 transform cursor-pointer" onclick="togglePasswordVisibility()">
                        <svg id="eye-icon" class="w-6 h-6 text-gray-800" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12c0 1.2-4.03 6-9 6s-9-4.8-9-6c0-1.2 4.03-6 9-6s9 4.8 9 6z" />
                        </svg>
                    </span>
                </div>
            </div>

            <!-- Input Konfirmasi Password -->
            <div class="relative">
                <label for="password_confirmation" class="block text-gray-700 font-medium mb-2">Konfirmasi
                    Password</label>
                <input type="password" id="password_confirmation" name="password_confirmation"
                    placeholder="Ulangi password Anda"
                    class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none"
                    required />
                @error('password_confirmation')
                <span class="text-red-500">{{ $message }}</span>
                @enderror
                <span class="absolute my-2 right-4 transform cursor-pointer" onclick="togglePasswordVisibility()">
                    <svg id="eye-icon" class="w-6 h-6 text-gray-800" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12c0 1.2-4.03 6-9 6s-9-4.8-9-6c0-1.2 4.03-6 9-6s9 4.8 9 6z" />
                    </svg>
                </span>
            </div>
                    <div class="my-6">
                        <button type="submit" class="w-full py-3 bg-blue-500 text-white rounded-lg text-lg">Register</button>
                    </div>

                    <div class="text-center">
                        <small>Sudah punya akun? <a href="{{route('login_view')}}" class="text-blue-500 hover:underline">Masuk</a></small>
                    </div>
                </form>
            </div>

        </div>
    </div>

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
        function togglePasswordVisibility() {
            const passwordInput = document.getElementById("password_confirmation");
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
