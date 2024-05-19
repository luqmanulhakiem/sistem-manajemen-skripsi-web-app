<?php

namespace App\Http\Controllers;

use App\Models\Bimbingan;
use App\Models\PengajuanDospem;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DospemMahasiswaController extends Controller
{
    public function index() {
        $id = auth()->user()->id;
        $find = User::where('id', $id)->first();
        $data = DB::table('pengajuan_dospems as pd')
        ->rightJoin('pengajuan_juduls as pj', 'pj.id_mahasiswa', '=', 'pd.id_mahasiswa')
        ->rightJoin('users as m', 'm.id', '=', 'pd.id_mahasiswa')
        ->rightJoin('users as d1', 'd1.id', '=', 'pd.id_dospem1')
        ->leftJoin('users as d2', function ($join) {
            $join->on('d2.id', '=', 'pd.id_dospem2')
                ->whereNotNull('pd.id_dospem2');
        })
        ->rightJoin('profiles as pf', 'pf.id', '=', 'm.id_profile')
        ->rightJoin('prodis as p', 'p.id', '=', 'pf.id_prodi')
        ->where('pd.status_dosen1', '=', 'diterima')
        ->where('m.id_fakultas', '=', $find->id_fakultas)
        ->where('pj.status', '=', 'diterima')
        ->select('pd.id', 'm.name', 'm.username', 'p.name as namaProdi', 'pj.judul', 'd1.name as Dospem1', DB::raw('CASE WHEN pd.id_dospem2 IS NOT NULL THEN d2.name ELSE NULL END as Dospem2')) //i want to get d2.name if pd.id_dospem2 not null 
        ->paginate(10);
        // return response()->json($data);


        return view('pages.dospemMahasiswa.index', compact('data'));
    }
    public function edit($id) {
        $auth = User::with('profile')->where('id', auth()->user()->id)->first();
        $data = DB::table('pengajuan_dospems as pd')
        ->rightJoin('pengajuan_juduls as pj', 'pj.id_mahasiswa', '=', 'pd.id_mahasiswa')
        ->rightJoin('users as m', 'm.id', '=', 'pd.id_mahasiswa')
        ->where('pd.id', '=', $id)
        ->select('pd.id', 'm.name', 'pj.judul')
        ->first();

        $dosen = User::with(['fakultas', 'profile.prodi', 'roles'])
        ->where('id_fakultas', $auth->id_fakultas)
        ->whereHas('roles', function ($query) {
            $query->whereIn('name', ['dosen_pembimbing', 'dosen_kaprodi']);
        })
        ->get();
        return view('pages.dospemMahasiswa.edit', compact('data', 'dosen'));
    }
    public function update($id, Request $request) {

        $id_dosen2 = $request->dosen;

        $find = PengajuanDospem::findorfail($id);
        $dt = [
            'id_dospem2' => $id_dosen2,
            'status_dosen2' => 'diterima'
        ];

        Bimbingan::create([
            'id_mahasiswa' => $find->id_mahasiswa,
            'id_dosen' => $id_dosen2,
        ]);
        $find->update($dt);
        return redirect()->route('dospem-mahasiswa');
    }
}
