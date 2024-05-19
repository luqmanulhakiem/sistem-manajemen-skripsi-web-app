<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Bimbingan extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_mahasiswa',
        'id_dosen',
    ];

    public function items(): HasMany
    {
        return $this->hasMany(BimbinganItem::class, 'id_bimbingan', 'id');
    }
}
