<?php

namespace App\Http\Controllers;

use App\Models\JumlahDospem;
use App\Models\PengajuanJudul;
use App\Models\User;
use Illuminate\Http\Request;

class PengajuanDospemController extends Controller
{
    public function index()
    {
        $auth = User::findorfail(auth()->user()->id);
        $data = PengajuanJudul::where('id_mahasiswa', auth()->user()->id)->first();
        $jumlah = JumlahDospem::where('id_fakultas', $auth->id_fakultas)->first();

        // return response()->json($auth);

        return view('pages.pengajuanDospem.index', compact('data', 'jumlah'));    
    }
}
