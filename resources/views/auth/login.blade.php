<!DOCTYPE html>
<html>
<head>
    <title>Masuk - Nusantara Rasa</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-orange-50 min-h-screen flex items-center justify-center px-4">
    <div class="max-w-md w-full">
        <div class="text-center mb-8">
            <img src="{{ asset('images/logo.png') }}" alt="Nusantara Rasa" class="h-14 w-auto mx-auto mb-3">
            <h1 class="text-2xl font-bold text-gray-800">Nusantara Rasa</h1>
            <p class="text-gray-500 text-sm mt-1">Masuk untuk mulai jelajahi resep</p>
        </div>

        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-8">
            @if ($errors->any())
                <div class="bg-red-50 text-red-600 text-sm px-4 py-3 rounded-lg mb-4">
                    {{ $errors->first() }}
                </div>
            @endif

            <form action="{{ url('/login') }}" method="POST" class="space-y-4">
                @csrf
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                    <input type="email" name="email" value="{{ old('email') }}" required
                           class="w-full border border-gray-300 rounded-lg px-3 py-2.5 focus:outline-none focus:ring-2 focus:ring-orange-400">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                    <input type="password" name="password" required
                           class="w-full border border-gray-300 rounded-lg px-3 py-2.5 focus:outline-none focus:ring-2 focus:ring-orange-400">
                </div>
                <button type="submit" class="w-full bg-orange-500 text-white py-2.5 rounded-lg font-semibold hover:bg-orange-600">
                    Masuk
                </button>
            </form>

            <p class="text-center text-sm text-gray-500 mt-6">
                Belum punya akun?
                <a href="{{ route('register') }}" class="text-orange-600 font-semibold hover:underline">Daftar</a>
            </p>
        </div>
    </div>
</body>
</html>