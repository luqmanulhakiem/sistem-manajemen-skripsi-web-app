<?php

namespace App\Http\Controllers;

use App\Models\Bidang;
use App\Models\BidangJudul;
use App\Models\PengajuanJudul;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PengajuanJudulController extends Controller
{
    public function index()
    {
        $data = PengajuanJudul::where('id_mahasiswa', auth()->user()->id)->first();
        if ($data != null) {
            $bidang = DB::table('bidang_juduls as bj')
            ->join('bidangs as b', 'b.id', '=', 'bj.id_bidang')
            ->where('bj.id_judul', '=', $data->id)
            ->select('b.nama')
            ->get();
            return view('pages.pengajuanJudul.index', compact('data', 'bidang'));
        }

        return view('pages.pengajuanJudul.index', compact('data'));
    }

    public function create()
    {
        $user = User::findorfail(auth()->user()->id);
        $bidang = Bidang::where('id_fakultas', $user->id_fakultas)->get();
        // return response()->json($bidang);
        return view('pages.pengajuanJudul.create', compact('bidang'));
    }

    public function store(Request $request) {
        $checkedItems = $request->input('bidang', []); 
        // return response()->json($checkedItems);
        $judul = PengajuanJudul::create([
            'id_mahasiswa' => auth()->user()->id,
            'judul' => $request->judul
        ]);

        foreach ($checkedItems as $key => $value) {
            BidangJudul::create([
                'id_judul' => $judul->id,
                'id_bidang' => $value,
            ]);
        }

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
