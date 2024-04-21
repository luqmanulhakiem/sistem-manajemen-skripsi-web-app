<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Prodi extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'id_fakultas'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'id_prodi', 'id');
    }
    
    public function fakultas(): BelongsTo
    {
        return $this->belongsTo(Fakultas::class, 'id_fakultas', 'id');
    }
}
