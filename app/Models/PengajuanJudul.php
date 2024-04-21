<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PengajuanJudul extends Model
{
    use HasFactory;
    protected $fillable = ['id_mahasiswa', 'id_dospem1', 'id_dospem2', 'judul', 'komentar', 'status'];

    
}
