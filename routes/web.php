<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\Produk;
use App\Http\Controllers\KomentarController;

// ----------------------------
// Halaman Umum (User)
// ----------------------------

Route::get('/', function () {
    $produk = Produk::latest()->get();
    return view('home', compact('produk'));
})->name('beranda');

Route::get('/katalog', function () {
    $produk = Produk::all();
    return view('katalog', compact('produk'));
})->name('katalog');

Route::view('/tentang', 'tentang')->name('tentang');

// ----------------------------
// Login & Logout Admin
// ----------------------------

Route::get('/pengaturan', fn() => view('pengaturan'))->name('pengaturan');

Route::post('/pengaturan', function (Request $request) {
    if ($request->input('username') === 'admin' && $request->input('password') === 'admin123') {
        session(['is_admin' => true]);
        return redirect()->route('admin.dashboard')->with('success', 'Berhasil login sebagai admin.');
    }

    return back()->withErrors(['msg' => 'Username atau password salah.']);
});

Route::get('/logout', function () {
    session()->forget('is_admin');
    return redirect()->route('beranda')->with('success', 'Berhasil logout.');
})->name('logout');

Route::get('/lupa-password', fn() => view('auth.lupa-password'))->name('lupa.password');

Route::post('/lupa-password', function () {
    return back()->with('status', 'Jika email terdaftar, instruksi reset telah dikirim.');
});

// ----------------------------
// Middleware Manual Admin Check
// ----------------------------

$adminMiddleware = function () {
    if (!session('is_admin')) {
        return redirect()->route('pengaturan')->withErrors(['msg' => 'Silakan login terlebih dahulu.']);
    }
};

// ----------------------------
// Admin Dashboard
// ----------------------------

Route::get('/admin', function () use ($adminMiddleware) {
    if ($redirect = $adminMiddleware()) return $redirect;

    $produk = Produk::all();
    return view('admin.dashboard', compact('produk'));
})->name('admin.dashboard');

// ----------------------------
// CRUD Produk (Admin)
// ----------------------------

Route::prefix('admin/produk')->group(function () use ($adminMiddleware) {

    Route::get('/', function () use ($adminMiddleware) {
        if ($redirect = $adminMiddleware()) return $redirect;
        $produk = Produk::all();
        return view('admin.produk.index', compact('produk'));
    })->name('admin.produk.index');

    Route::get('/create', function () use ($adminMiddleware) {
        if ($redirect = $adminMiddleware()) return $redirect;
        return view('admin.produk.create');
    })->name('admin.produk.create');

    Route::post('/store', function (Request $request) use ($adminMiddleware) {
        if ($redirect = $adminMiddleware()) return $redirect;

        $data = $request->validate([
            'nama'      => 'required|string|max:255',
            'harga'     => 'required|integer',
            'stok'      => 'required|integer',
            'deskripsi' => 'nullable|string',
            'gambar'    => 'nullable|image|max:2048',
        ]);


        if ($request->hasFile('gambar')) {
            $path = $request->file('gambar')->store('produk', 'public');
            $data['gambar'] = 'storage/' . $path;
        }

        Produk::create($data);
        return redirect()->route('admin.produk.index')->with('success', 'Produk berhasil ditambahkan.');
    })->name('admin.produk.store');

    Route::get('/edit/{id}', function ($id) use ($adminMiddleware) {
        if ($redirect = $adminMiddleware()) return $redirect;
        $produk = Produk::findOrFail($id);
        return view('admin.produk.edit', compact('produk'));
    })->name('admin.produk.edit');

    Route::match(['post', 'put'], '/update/{id}', function (Request $request, $id) use ($adminMiddleware) {
        if ($redirect = $adminMiddleware()) return $redirect;
        $produk = Produk::findOrFail($id);

        $data = $request->validate([
            'nama'      => 'required|string|max:255',
            'harga'     => 'required|integer',
            'stok'      => 'required|integer',
            'deskripsi' => 'nullable|string',
            'gambar'    => 'nullable|image|max:2048',
        ]);
        

        if ($request->hasFile('gambar')) {
            if ($produk->gambar && file_exists(public_path($produk->gambar))) {
                unlink(public_path($produk->gambar));
            }

            $path = $request->file('gambar')->store('produk', 'public');
            $data['gambar'] = 'storage/' . $path;
        }

        $produk->update($data);
        return redirect()->route('admin.produk.index')->with('success', 'Produk berhasil diperbarui.');
    })->name('admin.produk.update');

    Route::get('/delete/{id}', function ($id) use ($adminMiddleware) {
        if ($redirect = $adminMiddleware()) return $redirect;

        $produk = Produk::findOrFail($id);
        if ($produk->gambar && file_exists(public_path($produk->gambar))) {
            unlink(public_path($produk->gambar));
        }

        $produk->delete();
        return redirect()->route('admin.produk.index')->with('success', 'Produk berhasil dihapus.');
    })->name('admin.produk.delete');

    Route::delete('/destroy-all', function () use ($adminMiddleware) {
        if ($redirect = $adminMiddleware()) return $redirect;

        $produk = Produk::all();
        foreach ($produk as $item) {
            if ($item->gambar && file_exists(public_path($item->gambar))) {
                unlink(public_path($item->gambar));
            }
            $item->delete();
        }

        return redirect()->route('admin.produk.index')->with('success', 'Semua produk berhasil dihapus.');
    })->name('admin.produk.destroyAll');

    Route::get('/katalog', function (Request $request) {
        $search = $request->input('search');
    
        $produk = Produk::when($search, function ($query, $search) {
            return $query->where('nama', 'like', '%' . $search . '%');
        })->latest()->get();
    
        return view('katalog', compact('produk'));
    })->name('katalog');
    
    Route::get('/', function (Request $request) use ($adminMiddleware) {
        if ($redirect = $adminMiddleware()) return $redirect;
    
        $search = $request->input('search');
    
        $produk = Produk::when($search, function ($query, $search) {
            return $query->where('nama', 'like', '%' . $search . '%');
        })->orderBy('created_at', 'desc')->paginate(10); // paginate 10 per halaman
    
        return view('admin.produk.index', compact('produk'));
    })->name('admin.produk.index');
    
    Route::post('/komentar', [KomentarController::class, 'store'])->name('komentar.store');

    
});
