<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Angkatan extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'status'];

    public function profile(): BelongsTo
    {
        return $this->belongsTo(Angkatan::class, 'id_angkatan', 'id');
    }
}
