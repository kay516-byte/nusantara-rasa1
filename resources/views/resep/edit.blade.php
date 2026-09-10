<!DOCTYPE html>
<html>
<head>
    <title>Edit Resep</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 p-8">
    <div class="max-w-xl mx-auto bg-white rounded-xl shadow p-6">
        <a href="{{ route('resep.index') }}" class="text-orange-600 hover:underline text-sm">← Kembali</a>

        <h1 class="text-2xl font-bold text-gray-800 mt-2 mb-6">✏️ Edit Resep</h1>

        <form action="{{ route('resep.update', $resep->id) }}" method="POST" enctype="multipart/form-data" class="space-y-4">
            @csrf
            @method('PUT')
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Nama Resep</label>
                <input type="text" name="nama_resep" value="{{ $resep->nama_resep }}" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-orange-400">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Kategori</label>
                <select name="kategori_id" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-orange-400">
                    @foreach ($kategoris as $kategori)
                        <option value="{{ $kategori->id }}" {{ $resep->kategori_id == $kategori->id ? 'selected' : '' }}>
                            {{ $kategori->nama_kategori }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Bahan</label>
                <textarea name="bahan" rows="4" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-orange-400">{{ $resep->bahan }}</textarea>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Cara Masak</label>
                <textarea name="cara_masak" rows="4" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-orange-400">{{ $resep->cara_masak }}</textarea>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Foto</label>
                @if ($resep->foto)
                    <img src="{{ asset('storage/' . $resep->foto) }}" class="w-32 h-32 object-cover rounded-lg mb-2">
                @endif
                <input type="file" name="foto" class="w-full text-sm text-gray-600">
            </div>

            <button type="submit" class="bg-blue-500 text-white px-5 py-2 rounded-lg hover:bg-blue-600 font-medium">Update</button>
        </form>
    </div>
</body>
</html>