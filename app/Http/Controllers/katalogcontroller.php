<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class katalogcontroller extends Controller
{
    public function index(Request $request)
{
    $query = Produk::query();

    if ($request->has('search')) {
        $query->where('nama', 'like', '%' . $request->search . '%');
    }

    $produk = $query->latest()->get();

    return view('katalog', compact('produk'));
}

}
