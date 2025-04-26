<!DOCTYPE html>
<html lang="en">
<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - SIP-Kes</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<style>
  .form-check-input:checked {
    background-color: #293FCC !important;
    border-color: #293FCC !important;
  }

  .font-montserrat {
    font-family: 'Montserrat', sans-serif;
  }

  .font-poppins {
    font-family: 'Poppins', sans-serif;
  }
</style>

<body class="bg-gray-100 flex items-center justify-center h-screen">
    <div class="w-full max-w-4xl flex bg-white shadow-lg rounded-lg overflow-hidden">
        <!-- Left Section: Logo -->
        <div class="w-1/2 bg-gray-100 flex flex-col items-center justify-center p-10">
            <img src="{{ URL::asset('build/images/logos/logopengembang.png') }}" alt="SIP-Kes Logo" class="img-fluid w-75">
        </div>

        <!-- Right Section: Login Form -->
        <div class="w-1/2 p-10 flex flex-col justify-center">
            <h2 class="text-2xl font-bold text-gray-900 font-montserrat">Welcome to SIP-Kes</h2>
            <p class="text-sm text-gray-500 mb-6 font-poppins">Your Admin Dashboard</p>

    @if ($errors->has('login'))
    <div class="mb-4 text-red-500 text-sm">
        {{ $errors->first('login') }}
    </div>
    @endif

            <form action="{{ route('login') }}" method="POST">
    @csrf
    <div class="mb-4">
        <label class="block text-gray-700 text-sm mb-2 font-poppins" for="username">Username (Email)</label>
        <input type="text" id="username" name="username" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400" required>
        @error('username')
            <span class="text-red-500 text-sm">{{ $message }}</span>
        @enderror
    </div>

    <div class="mb-4">
        <label class="block text-gray-700 text-sm mb-2 font-poppins" for="password">Password</label>
        <input type="password" id="password" name="password" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400" required>
        @error('password')
            <span class="text-red-500 text-sm">{{ $message }}</span>
        @enderror
    </div>

    <div class="flex items-center mb-6 ">
        <input type="checkbox" id="remember" name="remember" class="mr-2">
        <label for="remember" class="text-sm text-gray-700 font-poppins">Remember This Device</label>
    </div>

    <button type="submit" class="w-full text-white font-bold py-2 rounded-lg shadow-md transition duration-300 font-poppins" style="background-color: #293FCC">
        Sign In
    </button>
</form>
        </div>
    </div>
</body>
</html>
