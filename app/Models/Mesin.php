<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Mesin extends Model
{
    protected $fillable = [
        'kode_mesin',
        'nama_mesin',
        'lokasi',
        'deskripsi',
        'status',
    ];

    public function laporanKerusakan(): HasMany
    {
        return $this->hasMany(LaporanKerusakan::class);
    }

    public function laporanMaintenance(): HasMany
    {
        return $this->hasMany(LaporanMaintenance::class);
    }
}