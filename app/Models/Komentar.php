<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Komentar extends Model
{
    protected $fillable = ['produk_id', 'nama', 'komentar', 'rating'];

    public function produk()
    {
        return $this->belongsTo(Produk::class);
    }
}
