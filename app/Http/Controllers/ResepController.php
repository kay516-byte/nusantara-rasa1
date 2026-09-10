<?php

namespace App\Http\Controllers;

use App\Models\Resep;
use App\Models\Kategori;
use Illuminate\Http\Request;

class ResepController extends Controller
{
    public function index(Request $request)
    {
        $query = Resep::with('kategori');

        if ($request->filled('search')) {
            $query->where('nama_resep', 'like', '%' . $request->search . '%');
        }

        if ($request->filled('kategori_id')) {
            $query->where('kategori_id', $request->kategori_id);
        }

        $reseps = $query->latest()->get();
        $kategoris = Kategori::all();

        return view('resep.index', compact('reseps', 'kategoris'));
    }

    public function create()
    {
        $kategoris = Kategori::all();
        return view('resep.create', compact('kategoris'));
    }

    public function store(Request $request)
    {
        $data = $request->except('_token');

        if ($request->hasFile('foto')) {
            $path = $request->file('foto')->store('foto_resep', 'public');
            $data['foto'] = $path;
        }

        Resep::create($data);
        return redirect()->route('resep.index');
    }

    public function show(Resep $resep)
    {
        return view('resep.show', compact('resep'));
    }

    public function edit(Resep $resep)
    {
        $kategoris = Kategori::all();
        return view('resep.edit', compact('resep', 'kategoris'));
    }

    public function update(Request $request, Resep $resep)
    {
        $data = $request->except(['_token', '_method']);

        if ($request->hasFile('foto')) {
            $path = $request->file('foto')->store('foto_resep', 'public');
            $data['foto'] = $path;
        }

        $resep->update($data);
        return redirect()->route('resep.index');
    }

    public function destroy(Resep $resep)
    {
        $resep->delete();
        return redirect()->route('resep.index');
    }
}