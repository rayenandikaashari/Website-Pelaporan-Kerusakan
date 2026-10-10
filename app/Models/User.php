<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasMany;

#[Fillable(['name', 'email', 'password'])]
#[Hidden(['password', 'remember_token'])]
class User extends Authenticatable
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable;

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
    public function laporanSebagaiOperator(): HasMany
{
    return $this->hasMany(LaporanKerusakan::class, 'operator_id');
}

public function laporanSebagaiTeknisi(): HasMany
{
    return $this->hasMany(LaporanKerusakan::class, 'teknisi_id');
}

public function maintenanceDikerjakan(): HasMany
{
    return $this->hasMany(LaporanMaintenance::class, 'teknisi_id');
}
}
