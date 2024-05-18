<?php

namespace App\Http\Controllers;

use App\Models\BidangDosen;
use App\Models\JumlahDospem;
use App\Models\PengajuanDospem;
use App\Models\PengajuanJudul;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PengajuanDospemController extends Controller
{
    public function index()
    {
        $auth = User::with('profile')->where('id', auth()->user()->id)->first();
        $data = PengajuanJudul::where('id_mahasiswa', auth()->user()->id)->first();
        $jumlah = JumlahDospem::where('id_fakultas', $auth->id_fakultas)->first();
        $dospem = PengajuanDospem::where('id_mahasiswa', auth()->user()->id)->first();
        $dosenmentah = User::with(['fakultas', 'profile.prodi', 'roles'])
        ->where('id_fakultas', $auth->id_fakultas)
        ->whereHas('roles', function ($query) {
            $query->whereIn('name', ['dosen_pembimbing', 'dosen_kaprodi']);
        })
        ->get();
        $dosen = $dosenmentah->filter(function ($value) {
            return BidangDosen::where('id_dosen', $value->id)->exists();
        });

        // dd($data);

        // return response()->json(["dosen1" => $dosen, "dosen2" => $filteredDosen]);
        if ($dospem) {
                $namadosen = User::where('id', $dospem->id_dospem1)->first();
                $namadosen2 = User::where('id', $dospem->id_dospem2)->first();
                // dd($namadosen->username);
                return view('pages.mahasiswaScreen.pengajuanDospem.index', compact('data', 'jumlah', 'dosen', 'dospem', 'namadosen', 'namadosen2'));    
            
        }
        return view('pages.mahasiswaScreen.pengajuanDospem.index', compact('data', 'jumlah', 'dosen', 'dospem'));    


    }
    public function store(Request $request){
        $dospem = $request->dospem;
        $idmhs = auth()->user()->id;

        PengajuanDospem::create([
            'id_mahasiswa' => $idmhs,
            'id_dospem1' => $dospem
        ]);
        return redirect()->route('pengajuan-dospem');
    }
    public function update(Request $request) {
        $dospem = $request->dospem;
        $idmhs = auth()->user()->id;

        $find = PengajuanDospem::where('id_mahasiswa', $idmhs)->first();


        $dt = [
            'id_dospem1' => $dospem,
            'status_dosen1' => "diajukan"
        ];
        $find->update($dt);
        return redirect()->route('pengajuan-dospem');
    }
}
