<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Artikel;

class ArtikelController extends Controller
{

    public function index()
    {
        // nampilin data artikel dari database

        // $artikels = Artikel::select('title', 'content')->get();
        // dd($artikels);

        return view('artikel.index', [
            'artikel' => Artikel::get(['id','title', 'content'])
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
        ]);

        Artikel::create($validated);
        return redirect()->route('artikel.index');
    }

    public function edit(Artikel $artikel)
    {
        $this->authorize('update', $artikel);
        return view('artikel.edit', compact('artikel'));
    }

    public function update(Request $request, Artikel $artikel)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
        ]);

        $artikel->update($validated);

        return redirect()->route('artikel.index');
    }

    public function destroy(Artikel $artikel)
    {
        $artikel->delete();
        return redirect()->route('artikel.index');
    }
}
