<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class profile extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_prodi',
        'id_angkatan',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'id_profile', 'id');
    }
    public function angkatan(): HasOne
    {
        return $this->hasOne(Angkatan::class, 'id', 'id_angkatan', 'id');
    }
    public function prodi(): HasOne
    {
        return $this->hasOne(Prodi::class, 'id', 'id_prodi', 'id');
    }
}
