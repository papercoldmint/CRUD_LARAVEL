<?php

namespace App\Http\Controllers;

use App\Models\Makanan;
use Illuminate\Http\Request;

class MakananController extends Controller
{
    public function index()
    {
        $makanans = Makanan::latest()->paginate(5);
        return view('makanans.index', [
            'makanans' => $makanans,
            'i' => (request()->input('page', 1) - 1) * 5
        ]);
    }
    public function create()
    {
        return view('makanans.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'deskripsi' => 'required',
            'harga' => 'required|numeric',
            'kategori' => 'required',
        ]);
    
        // Hanya ambil field yang diperlukan
        Makanan::create($request->only(['nama', 'deskripsi', 'harga', 'kategori']));
    
        return redirect()->route('makanans.index')
            ->with('success', 'Makanan created successfully.');
    }
    
    public function update(Request $request, Makanan $makanan)
    {
        $request->validate([
            'nama' => 'required',
            'deskripsi' => 'required',
            'harga' => 'required|numeric',
            'kategori' => 'required',
        ]);
    
        // Hanya update field yang diperlukan
        $makanan->update($request->only(['nama', 'deskripsi', 'harga', 'kategori']));
    
        return redirect()->route('makanans.index')
            ->with('success', 'Makanan updated successfully');
    }

    public function show(Makanan $makanan)
    {
        return view('makanans.show', compact('makanan'));
    }

    public function edit(Makanan $makanan)
    {
        return view('makanans.edit', compact('makanan'));
    }


    public function destroy(Makanan $makanan)
    {
        $makanan->delete();

        return redirect()->route('makanans.index')
            ->with('success', 'Makanan deleted successfully');
    }
}