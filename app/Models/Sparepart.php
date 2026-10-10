<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Sparepart extends Model
{
    protected $fillable = [
        'kode_sparepart',
        'nama_sparepart',
        'stok',
        'harga',
        'deskripsi',
    ];

    protected function casts(): array
    {
        return [
            'stok' => 'integer',
            'harga' => 'decimal:2',
        ];
    }

    public function penggunaanSparepart(): HasMany
    {
        return $this->hasMany(PenggunaanSparepart::class);
    }
}