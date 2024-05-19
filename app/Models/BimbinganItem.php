<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BimbinganItem extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_bimbingan',
        'tgl_bimbingan',
        'catatan',
    ];

    public function bimbingan(): BelongsTo
    {
        return $this->belongsTo(Bimbingan::class, 'id', 'id_bimbingan');
    }
}
