<?php

namespace App\Http\Controllers;

use App\Models\Makanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MakananController extends Controller
{
    public function index()
    {
        $makanans = Makanan::latest()->get();
        return view('makanans.index', compact('makanans'));
    }

    public function create()
    {
        return view('makanans.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_makanan' => 'required|string|max:255',
            'harga' => 'required|numeric',
            'deskripsi' => 'required|string',
            'foto' => 'nullable|image|max:2048'
        ]);

        $data = $request->all();

        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('foto_makanan', 'public');
        }

        Makanan::create($data);

        return redirect()->route('makanans.index')->with('success', 'Makanan berhasil ditambahkan!');
    }

    public function edit(Makanan $makanan)
    {
        return view('makanans.edit', compact('makanan'));
    }

    public function update(Request $request, Makanan $makanan)
    {
        $request->validate([
            'nama_makanan' => 'required|string|max:255',
            'harga' => 'required|numeric',
            'deskripsi' => 'required|string',
            'foto' => 'nullable|image|max:2048'
        ]);

        $data = $request->all();

        if ($request->hasFile('foto')) {
            if ($makanan->foto) {
                Storage::delete('public/' . $makanan->foto);
            }
            $data['foto'] = $request->file('foto')->store('foto_makanan', 'public');
        }

        $makanan->update($data);

        return redirect()->route('makanans.index')->with('success', 'Makanan berhasil diperbarui!');
    }

    public function destroy(Makanan $makanan)
    {
        if ($makanan->foto) {
            Storage::delete('public/' . $makanan->foto);
        }

        $makanan->delete();

        return redirect()->route('makanans.index')->with('success', 'Makanan berhasil dihapus!');
    }
}
