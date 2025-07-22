<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    // Aktifkan mass assignment untuk kolom ini
    protected $fillable = [
        'nama',
        'harga',
        'stok',
        'gambar',
        'deskripsi', // opsional jika kamu ingin menambahkan
    ];

    // Jika ingin auto-casting (misalnya harga sebagai integer)
    protected $casts = [
        'harga' => 'integer',
        'stok'  => 'integer',
    ];

    // Contoh accessor untuk nama produk (huruf kapital di awal)
    public function getNamaAttribute($value)
    {
        return ucwords($value);
    }

    // Jika kamu punya relasi kategori, aktifkan ini:
    // public function kategori()
    // {
    //     return $this->belongsTo(Kategori::class);
    // }

    // Jika kamu ingin menambahkan gambar default
    public function getGambarUrlAttribute()
    {
        return $this->gambar 
            ? asset($this->gambar)
            : 'https://via.placeholder.com/300x200?text=No+Image';
    }
    public function komentars()
    {
    return $this->hasMany(Komentar::class);
    }

}



