<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Fakultas extends Model
{
    use HasFactory;
    protected $fillable = ['name'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'id_fakultas', 'id');
    }
    
    public function prodi(): HasMany
    {
        return $this->hasMany(Prodi::class, 'id_fakultas', 'id', 'id_fakultas');
    }
}
