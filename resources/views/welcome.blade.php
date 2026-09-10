<!DOCTYPE html>
<html>
<head>
    <title>Nusantara Rasa - Jelajahi Resep Masakan Indonesia</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50">

    <!-- NAVBAR -->
    <nav class="bg-white border-b sticky top-0 z-10">
        <div class="max-w-6xl mx-auto px-8 py-4 flex items-center justify-between">

            <div class="flex items-center gap-2">
                <img src="{{ asset('images/logo.png') }}" alt="Nusantara Rasa" class="h-8 w-auto">
                <span class="font-bold text-gray-800 text-lg">Nusantara Rasa</span>
            </div>

            <div class="hidden md:flex items-center gap-8 text-sm text-gray-600 font-medium">
                <a href="#beranda" class="hover:text-orange-500">Beranda</a>

                <a href="{{ route('resep.index') }}" class="hover:text-orange-500">
                    Resep
                </a>

                <a href="#tentang" class="hover:text-orange-500">Tentang</a>
                <a href="#kontak" class="hover:text-orange-500">Kontak</a>
            </div>

            <!-- MASUK & DAFTAR -->
            <div class="flex items-center gap-3">

                <a href="{{ route('login') }}"
                   class="text-gray-600 text-sm font-semibold hover:text-orange-500">
                    Masuk
                </a>

                <a href="{{ route('register') }}"
                   class="bg-orange-500 text-white text-sm font-semibold px-5 py-2 rounded-full hover:bg-orange-600">
                    Daftar
                </a>

            </div>
        </div>
    </nav>


    <!-- HERO -->
    <div id="beranda" class="max-w-6xl mx-auto px-8 py-16 grid grid-cols-1 md:grid-cols-2 gap-10 items-center">

        <div>

            <p class="text-orange-500 font-semibold text-sm mb-3">
                🍛 Cita Rasa Nusantara
            </p>

            <h1 class="text-5xl font-bold text-gray-800 leading-tight mb-5">
                Jelajahi Resep<br>Masakan Nusantara
            </h1>

            <p class="text-gray-500 mb-8 leading-relaxed">
                Kumpulan resep otentik masakan Indonesia — dari makanan berat,
                jajanan, minuman, hingga sambal. Mudah diikuti dan cocok dicoba
                di rumah.
            </p>

            <div class="flex gap-4">

                <a href="{{ route('resep.index') }}"
                   class="bg-gray-800 text-white px-6 py-3 rounded-full font-semibold text-sm hover:bg-gray-900">
                    🔍 Cari Resep
                </a>

                <a href="{{ route('resep.create') }}"
                   class="border border-gray-300 text-gray-700 px-6 py-3 rounded-full font-semibold text-sm hover:bg-gray-50">
                    + Tambah Resep
                </a>

            </div>

        </div>


        <div class="relative">

            @php
                $heroReseps = \App\Models\Resep::whereNotNull('foto')
                    ->latest()
                    ->take(3)
                    ->get();
            @endphp

            @if ($heroReseps->count() > 0)

                <img src="{{ asset('storage/' . $heroReseps[0]->foto) }}"
                     class="w-full h-80 object-cover rounded-3xl shadow-lg">

                @if ($heroReseps->count() > 1)

                    <img src="{{ asset('storage/' . $heroReseps[1]->foto) }}"
                         class="absolute -bottom-6 -left-6 w-28 h-28 object-cover rounded-2xl shadow-lg border-4 border-white">

                @endif

            @else

                <div class="w-full h-80 bg-orange-50 rounded-3xl flex items-center justify-center text-orange-300 text-5xl">
                    🍽️
                </div>

            @endif

        </div>

    </div>


    <!-- STATISTIK SINGKAT -->
    <div class="bg-white border-y">

        <div class="max-w-6xl mx-auto px-8 py-8 grid grid-cols-2 md:grid-cols-4 gap-6 text-center">

            @php
                $totalResep = \App\Models\Resep::count();
                $totalKategori = \App\Models\Kategori::count();
            @endphp

            <div>
                <p class="text-3xl font-bold text-orange-500">
                    {{ $totalResep }}
                </p>
                <p class="text-gray-500 text-sm mt-1">
                    Resep Tersedia
                </p>
            </div>

            <div>
                <p class="text-3xl font-bold text-orange-500">
                    {{ $totalKategori }}
                </p>
                <p class="text-gray-500 text-sm mt-1">
                    Kategori
                </p>
            </div>

            <div>
                <p class="text-3xl font-bold text-orange-500">
                    34
                </p>
                <p class="text-gray-500 text-sm mt-1">
                    Provinsi Terwakili
                </p>
            </div>

            <div>
                <p class="text-3xl font-bold text-orange-500">
                    100%
                </p>
                <p class="text-gray-500 text-sm mt-1">
                    Gratis Digunakan
                </p>
            </div>

        </div>

    </div>


    <!-- TENTANG -->
    <div id="tentang" class="max-w-6xl mx-auto px-8 py-16">

        <div class="text-center max-w-2xl mx-auto mb-12">

            <p class="text-orange-500 font-semibold text-sm mb-2">
                Tentang Kami
            </p>

            <h2 class="text-3xl font-bold text-gray-800 mb-4">
                Melestarikan Cita Rasa Nusantara
            </h2>

            <p class="text-gray-500 leading-relaxed">
                Nusantara Rasa adalah platform berbagi resep masakan khas
                Indonesia, dibuat agar siapa pun bisa dengan mudah menemukan
                dan mencoba hidangan tradisional dari berbagai daerah.
            </p>

        </div>


        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 text-center">

                <div class="w-12 h-12 bg-orange-50 rounded-full flex items-center justify-center mx-auto mb-4 text-2xl">
                    📖
                </div>

                <h3 class="font-semibold text-gray-800 mb-2">
                    Resep Lengkap
                </h3>

                <p class="text-gray-500 text-sm">
                    Bahan dan langkah memasak dijelaskan secara rinci dan mudah diikuti.
                </p>

            </div>


            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 text-center">

                <div class="w-12 h-12 bg-orange-50 rounded-full flex items-center justify-center mx-auto mb-4 text-2xl">
                    🔍
                </div>

                <h3 class="font-semibold text-gray-800 mb-2">
                    Mudah Dicari
                </h3>

                <p class="text-gray-500 text-sm">
                    Cari resep berdasarkan nama atau filter berdasarkan kategori favoritmu.
                </p>

            </div>


            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 text-center">

                <div class="w-12 h-12 bg-orange-50 rounded-full flex items-center justify-center mx-auto mb-4 text-2xl">
                    🤝
                </div>

                <h3 class="font-semibold text-gray-800 mb-2">
                    Bebas Berbagi
                </h3>

                <p class="text-gray-500 text-sm">
                    Siapa saja bisa menambahkan resep favoritnya untuk dibagikan ke orang lain.
                </p>

            </div>

        </div>

    </div>


    <!-- KATEGORI -->
    <div class="bg-white border-y">

        <div class="max-w-6xl mx-auto px-8 py-16">

            <div class="text-center mb-10">

                <p class="text-orange-500 font-semibold text-sm mb-2">
                    Jelajahi
                </p>

                <h2 class="text-3xl font-bold text-gray-800">
                    Kategori Resep
                </h2>

            </div>


            <div class="grid grid-cols-2 md:grid-cols-4 gap-4">

                @php
                    $kategoris = \App\Models\Kategori::all();
                @endphp

                @foreach ($kategoris as $kategori)

                    <a href="{{ route('resep.index', ['kategori_id' => $kategori->id]) }}"
                       class="bg-orange-50 hover:bg-orange-100 rounded-2xl p-6 text-center transition">

                        <div class="w-10 h-10 bg-orange-500 text-white rounded-full flex items-center justify-center mx-auto mb-3 font-bold">
                            {{ substr($kategori->nama_kategori, 0, 1) }}
                        </div>

                        <p class="font-semibold text-gray-800 text-sm">
                            {{ $kategori->nama_kategori }}
                        </p>

                        <p class="text-gray-400 text-xs mt-1">
                            {{ $kategori->reseps()->count() }} resep
                        </p>

                    </a>

                @endforeach

            </div>

        </div>

    </div>


    <!-- CTA -->
    <div class="max-w-6xl mx-auto px-8 py-16 text-center">

        <h2 class="text-3xl font-bold text-gray-800 mb-4">
            Punya Resep Favorit?
        </h2>

        <p class="text-gray-500 mb-8 max-w-xl mx-auto">
            Bagikan resep masakan Nusantara favoritmu dan bantu lestarikan kuliner Indonesia.
        </p>

        <a href="{{ route('resep.create') }}"
           class="inline-block bg-orange-500 text-white px-8 py-3 rounded-full font-semibold hover:bg-orange-600">
            + Tambah Resep Sekarang
        </a>

    </div>


    <!-- FOOTER -->
    <footer id="kontak" class="bg-gray-900 text-gray-300">

        <div class="max-w-6xl mx-auto px-8 py-12 grid grid-cols-1 md:grid-cols-3 gap-8">

            <div>

                <div class="flex items-center gap-2 mb-4">

                    <img src="{{ asset('images/logo.png') }}"
                         alt="Nusantara Rasa"
                         class="h-7 w-auto">

                    <span class="font-bold text-white">
                        Nusantara Rasa
                    </span>

                </div>

                <p class="text-sm text-gray-400 leading-relaxed">
                    Platform berbagi resep masakan khas Indonesia dari berbagai daerah.
                </p>

            </div>


            <div>

                <h4 class="font-semibold text-white mb-3 text-sm">
                    Tautan
                </h4>

                <ul class="space-y-2 text-sm text-gray-400">

                    <li>
                        <a href="{{ route('resep.index') }}"
                           class="hover:text-orange-400">
                            Semua Resep
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('resep.create') }}"
                           class="hover:text-orange-400">
                            Tambah Resep
                        </a>
                    </li>

                    <li>
                        <a href="#tentang"
                           class="hover:text-orange-400">
                            Tentang Kami
                        </a>
                    </li>

                </ul>

            </div>


            <div>

                <h4 class="font-semibold text-white mb-3 text-sm">
                    Kontak
                </h4>

                <ul class="space-y-2 text-sm text-gray-400">

                    <li>📧 halo@nusantararasa.id</li>
                    <li>📍 Makassar, Indonesia</li>
                    <li>📱 Instagram: @nusantararasa</li>

                </ul>

            </div>

        </div>


        <div class="border-t border-gray-800 py-4 text-center text-xs text-gray-500">
            © {{ date('Y') }} Nusantara Rasa. Tugas Kuliah — Dibuat dengan Laravel.
        </div>

    </footer>

</body>
</html>