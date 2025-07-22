<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Komentar;

class KomentarController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'produk_id' => 'required|exists:produks,id',
            'nama' => 'required|string|max:100',
            'komentar' => 'required|string|max:500',
            'rating' => 'nullable|integer|min:1|max:5',
        ]);

        Komentar::create([
            'produk_id' => $request->produk_id,
            'nama' => $request->nama,
            'komentar' => $request->komentar,
            'rating' => $request->rating,
        ]);

        return back()->with('success', 'Ulasan berhasil dikirim!');
    }
}
