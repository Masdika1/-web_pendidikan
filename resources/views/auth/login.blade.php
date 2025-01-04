<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>LOGIN FORM</title>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">

    <!-- Main Container -->
    <div class="bg-white shadow-lg rounded-lg overflow-hidden flex flex-col md:flex-row max-w-4xl w-full">

        <!-- Left Box -->
        <div class="bg-blue-600 text-white flex flex-col items-center justify-center p-6 md:w-1/2">
            <img src="https://i.pinimg.com/736x/3c/e6/ca/3ce6ca39ed39d4e677777831a34bd365.jpg" alt="Medic Icon" class="w-60 rounded-full mb-4">
            <h2 class="text-2xl font-bold font-mono">SKILLIFY</h2>
            <p class="text-center text-sm mt-2 font-mono">
                Belajar Lebih Mudah, Ciptakan Masa Depan Cerah!
            </p>
        </div>

        <!-- Right Box -->
        <div class="p-8 flex-1">
            <h2 class="text-2xl font-semibold">Hell-O</h2>
            <p class="text-gray-600 mt-2 mb-6">Ayo masuk untuk mulai menjelajah berbagai kursus yang kami tawarkan!</p>
            @if(session('error'))
                <div class="alert alert-error bg-green-500 text-white p-4 rounded-lg shadow-md flex items-center space-x-4 my-10" role="alert">
                    <span>{{ session('error') }}</span>
                </div>
            @endif
            <form method="POST" action="{{route('login')}}" class="space-y-4">
                @csrf
                <div>
                    <input type="email" name="email" placeholder="email"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg text-sm focus:ring focus:ring-blue-500 focus:outline-none"
                        required>
                        @error('email')
                             <span class="text-red-500">{{ $message }}</span>
                        @enderror
                </div>
                <div class="relative">
                    <input type="password" id="password" name="password" placeholder="Password"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg text-sm focus:ring focus:ring-blue-500 focus:outline-none"
                        required>
                        @error('password')
                            <span class="text-red-500">{{ $message }}</span>
                       @enderror
                    <span class="absolute top-1/2 right-4 transform -translate-y-1/2 cursor-pointer" onclick="togglePasswordVisibility()">
                        <svg id="eye-icon" class="w-6 h-6 text-gray-800" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12c0 1.2-4.03 6-9 6s-9-4.8-9-6c0-1.2 4.03-6 9-6s9 4.8 9 6z" />
                        </svg>
                    </span>
                </div>
                <button type="submit"
                    class="w-full bg-blue-400 hover:bg-blue-500 text-white py-2 px-4 rounded-lg transition duration-200">
                    Login
                </button>
                <div class="text-sm text-center">
                    Belum punya akun? <a href="register.php" class="text-blue-500 hover:underline">Daftar</a>
                </div>
            </form>
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

        function closeModal() {
            document.getElementById("successModal").classList.add("hidden");
            document.getElementById("errorModal").classList.add("hidden");
        }
    </script>
</body>
</html>
