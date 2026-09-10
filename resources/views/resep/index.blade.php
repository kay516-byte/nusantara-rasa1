<!DOCTYPE html>
<html>
<head>
    <title>Nusantara Rasa</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

    <!-- HERO -->
    <div class="bg-white border-b">
        <div class="max-w-6xl mx-auto px-6 pt-6 pb-10">

            <!-- top bar: logo, search, auth -->
            <div class="flex items-center gap-6 mb-8">
                <img src="{{ asset('images/logo.png') }}" alt="Nusantara Rasa" class="h-10 w-auto">

                <form action="{{ route('resep.index') }}" method="GET" class="flex-1 max-w-md">
                    <div class="flex items-center bg-gray-100 rounded-full px-4 py-2.5">
                        <span class="text-gray-400 mr-2">🔍</span>
                        <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari Resep"
                               class="bg-transparent outline-none w-full text-sm">
                    </div>
                </form>

                <div class="flex items-center gap-4 ml-auto">
                    <span class="text-sm text-gray-600">Halo, {{ auth()->user()->name }}</span>
                    <form action="{{ route('logout') }}" method="POST">s
                        @csrf
                        <button type="submit" class="bg-white border border-gray-300 rounded-full px-5 py-2 text-sm font-semibold hover:bg-gray-50">Keluar</button>
                    </form>
                </div>
            </div>

            <h1 class="text-4xl font-serif font-bold text-center text-gray-800">Jelajahi Resep</h1>
        </div>
    </div>

    <!-- KATEGORI + KONTEN -->
    <div class="max-w-6xl mx-auto px-6 py-8">
        <div class="bg-white rounded-3xl shadow-sm border border-gray-100 px-6 py-5 flex items-center justify-between flex-wrap gap-3 mb-6">
            <div class="flex gap-2 flex-wrap">
                <a href="{{ route('resep.index') }}"
                   class="px-4 py-2 rounded-full text-sm font-medium {{ !request('kategori_id') ? 'bg-gray-800 text-white' : 'text-gray-500 hover:bg-gray-50' }}">
                    Semua
                </a>
                @foreach ($kategoris as $kategori)
                    <a href="{{ route('resep.index', ['kategori_id' => $kategori->id]) }}"
                       class="px-4 py-2 rounded-full text-sm font-medium {{ request('kategori_id') == $kategori->id ? 'bg-gray-800 text-white' : 'text-gray-500 hover:bg-gray-50' }}">
                        {{ $kategori->nama_kategori }}
                    </a>
                @endforeach
            </div>
            <a href="{{ route('resep.create') }}" class="bg-orange-500 text-white px-5 py-2 rounded-full text-sm font-medium hover:bg-orange-600 whitespace-nowrap">
                + Tambah Resep
            </a>
        </div>

        <p class="text-gray-500 text-sm mb-4">Anda memiliki <span class="font-semibold text-gray-700">{{ $reseps->count() }}</span> resep untuk dicoba.</p>

        <div class="grid grid-cols-1 lg:grid-cols-4 gap-6">
            <div class="lg:col-span-3">
                @if ($reseps->isEmpty())
                    <div class="text-center py-20 text-gray-400">Belum ada resep yang cocok 😔</div>
                @else
                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-5">
                        @foreach ($reseps as $resep)
                            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden hover:shadow-md transition">
                                <div class="relative">
                                    <a href="{{ route('resep.show', $resep->id) }}">
                                        @if ($resep->foto)
                                            <img src="{{ asset('storage/' . $resep->foto) }}" class="w-full h-36 object-cover">
                                        @else
                                            <div class="w-full h-36 bg-gray-100 flex items-center justify-center text-3xl text-gray-300">🍽️</div>
                                        @endif
                                    </a>
                                    <button type="button"
                                            onclick="toggleLike(this, {{ $resep->id }})"
                                            class="like-btn absolute top-2 right-2 bg-white rounded-full w-9 h-9 flex items-center justify-center shadow hover:scale-110 transition">
                                        <svg class="w-5 h-5 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z" />
                                        </svg>
                                    </button>
                                </div>
                                <div class="p-3">
                                    <h3 class="font-semibold text-gray-800 text-sm mb-1 leading-snug">
                                        <a href="{{ route('resep.show', $resep->id) }}" class="hover:text-orange-600">{{ $resep->nama_resep }}</a>
                                    </h3>
                                    <p class="text-xs text-gray-400 mb-2">
                                        <span class="text-gray-600 font-medium">{{ $resep->kategori->nama_kategori ?? '-' }}</span>
                                    </p>
                                    <div class="flex items-center justify-between text-xs text-gray-400 border-t pt-2">
                                        <span>💬 {{ (($resep->id * 7) % 30) + 3 }}</span>
                                        <span>❤️ {{ (($resep->id * 13) % 40) + 5 }}</span>
                                        <div class="flex gap-2">
                                            <a href="{{ route('resep.edit', $resep->id) }}" class="text-blue-600 hover:underline">Edit</a>
                                            <form action="{{ route('resep.destroy', $resep->id) }}" method="POST" onsubmit="return confirm('Yakin hapus?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-600 hover:underline">Hapus</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>

            <div class="space-y-5">
                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-4">
                    <h4 class="font-semibold text-gray-800 text-sm mb-3">Kategori Populer</h4>
                    <div class="space-y-3">
                        @foreach ($kategoris as $kategori)
                            <div class="flex items-center gap-2 text-sm">
                                <div class="w-8 h-8 bg-orange-100 rounded-full flex items-center justify-center text-orange-500 text-xs font-bold">
                                    {{ substr($kategori->nama_kategori, 0, 1) }}
                                </div>
                                <div>
                                    <p class="text-gray-700 font-medium">{{ $kategori->nama_kategori }}</p>
                                    <p class="text-gray-400 text-xs">{{ $kategori->reseps()->count() }} resep</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-4">
                    <h4 class="font-semibold text-gray-800 text-sm mb-3">Ingin masak apa?</h4>
                    <div class="flex flex-wrap gap-2">
                        <span class="bg-gray-100 text-gray-600 text-xs px-3 py-1 rounded-full">Pedas</span>
                        <span class="bg-gray-100 text-gray-600 text-xs px-3 py-1 rounded-full">Berkuah</span>
                        <span class="bg-gray-100 text-gray-600 text-xs px-3 py-1 rounded-full">Gorengan</span>
                        <span class="bg-gray-100 text-gray-600 text-xs px-3 py-1 rounded-full">Manis</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function toggleLike(btn, id) {
            const key = 'liked_resep_' + id;
            const svg = btn.querySelector('svg');
            const isLiked = localStorage.getItem(key) === 'true';

            if (isLiked) {
                localStorage.removeItem(key);
                svg.setAttribute('fill', 'none');
                svg.classList.remove('text-red-500');
                svg.classList.add('text-gray-300');
            } else {
                localStorage.setItem(key, 'true');
                svg.setAttribute('fill', 'currentColor');
                svg.classList.remove('text-gray-300');
                svg.classList.add('text-red-500');
            }
        }

        document.querySelectorAll('.like-btn').forEach(function (btn) {
            const onclickAttr = btn.getAttribute('onclick');
            const id = onclickAttr.match(/\d+/)[0];
            const key = 'liked_resep_' + id;
            const svg = btn.querySelector('svg');
            if (localStorage.getItem(key) === 'true') {
                svg.setAttribute('fill', 'currentColor');
                svg.classList.remove('text-gray-300');
                svg.classList.add('text-red-500');
            }
        });
    </script>
</body>
</html>