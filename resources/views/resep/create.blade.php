<!DOCTYPE html>
<html>
<head>
    <title>Tambah Resep</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 p-8">
    <div class="max-w-xl mx-auto bg-white rounded-xl shadow p-6">
        <a href="{{ route('resep.index') }}" class="text-orange-600 hover:underline text-sm">← Kembali</a>

        <h1 class="text-2xl font-bold text-gray-800 mt-2 mb-6">🍳 Tambah Resep Baru</h1>

        <form action="{{ route('resep.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
            @csrf
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Nama Resep</label>
                <input type="text" name="nama_resep" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-orange-400">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Kategori</label>
                <select name="kategori_id" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-orange-400">
                    @foreach ($kategoris as $kategori)
                        <option value="{{ $kategori->id }}">{{ $kategori->nama_kategori }}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Bahan</label>
                <textarea name="bahan" rows="4" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-orange-400"></textarea>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Cara Masak</label>
                <textarea name="cara_masak" rows="4" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-orange-400"></textarea>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Foto</label>
                <input type="file" name="foto" class="w-full text-sm text-gray-600">
            </div>

            <button type="submit" class="bg-orange-500 text-white px-5 py-2 rounded-lg hover:bg-orange-600 font-medium">Simpan</button>
        </form>
    </div>
</body>
</html>