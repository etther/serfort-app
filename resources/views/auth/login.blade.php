<!DOCTYPE html>
<html lang="en" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Serfort-Login</title>
    @vite('resources/css/app.css')
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.js"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.14.1/dist/cdn.min.js"></script>
</head>

<body class="bg-[#252a2f] h-screen flex justify-center items-center">
    <div class="w-full max-w-sm sm:max-w-md bg-white rounded-lg shadow-md p-6 space-y-6">
        <div class="flex items-center justify-center gap-x-4">
            <!-- Logo Image -->
            <img src="/img/serfort.png" alt="Logo" class="w-10 h-10">

            <!-- Welcome Text -->
            <h2 class="text-2xl font-semibold text-gray-900">Welcome To Serfort</h2>
        </div>

        <form method="POST" action="" class="space-y-4">
            @csrf
            <!-- Email -->
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700">Email Address</label>
                <input id="email" type="email" name="email" value="" required autofocus
                    class="block w-full px-4 py-2 mt-1 text-gray-900 bg-gray-100 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500">
                @error('email')
                    <span class="text-red-600 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <!-- Password -->
            <div>
                <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                <input id="password" type="password" name="password" required
                    class="block w-full px-4 py-2 mt-1 text-gray-900 bg-gray-100 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500">
                @error('password')
                    <span class="text-red-600 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <!-- Remember Me -->
            <div class="flex items-center">
                <input id="remember_me" type="checkbox"
                    class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded" name="remember">
                <label for="remember_me" class="ml-2 block text-sm text-gray-700">Remember Me</label>
            </div>

            <!-- Submit Button -->
            <div class="pt-4">
                <button type="submit"
                    class="w-full px-4 py-2 text-white bg-blue-600 rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                    Login
                </button>
            </div>

            <!-- Forgot Password Link -->
            <div class="text-sm text-center">
                <a href="" class="text-blue-500 hover:underline">Forgot your password?</a>
            </div>

            <!-- Sign Up Link -->
            <div class="text-sm text-center">
                <p>Don't have an account? <a href="" class="text-blue-500 hover:underline">Sign up</a></p>
            </div>
        </form>
    </div>
</body>




</html>
