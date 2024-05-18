<?php

namespace App\Http\Controllers;

use App\Models\PengajuanJudul;
use Illuminate\Http\Request;

class PengajuanJudulController extends Controller
{
    public function index()
    {
        $data = PengajuanJudul::where('id_mahasiswa', auth()->user()->id)->first();

        return view('pages.pengajuanJudul.index', compact('data'));
    }

    public function create()
    {
        // $bidang = 
        return view('pages.pengajuanJudul.create');
    }

    public function store(Request $request) {
        PengajuanJudul::create([
            'id_mahasiswa' => auth()->user()->id,
            'judul' => $request->judul
        ]);

        return redirect()->route('pengajuan-judul');
    }

    public function edit()
    {
        return view('pages.pengajuanJudul.edit');
    }

    public function update(Request $request) {
        $data = PengajuanJudul::where('id_mahasiswa', auth()->user()->id)->first();

        $dt = [
            'judul' => $request->judul,
            'status' => 'diajukan'
        ];
        $data->update($dt);
        
        return redirect()->route('pengajuan-judul');
    }
}
