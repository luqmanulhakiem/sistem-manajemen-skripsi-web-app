<?php

namespace App\Http\Controllers;

use App\Models\PengajuanDospem;
use App\Models\PengajuanJudul;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DosenPembimbingScreenController extends Controller
{
    //** Halaman Pengajuan Bimbingan*/
    public function pbIndex(){
        // $data = DB::table('pengajuan_dospems as pd')
        // ->rightJoin('pengajuan_juduls as pj', 'pj.id_mahasiswa', '=', 'pd.id_mahasiswa')
        // ->rightJoin('users as m', 'm.id', '=', 'pd.id_mahasiswa')
        // ->where('pd.id_dospem1', '=', auth()->user()->id)
        // ->orWhere('pd.id_dospem2', '=', auth()->user()->id)
        // ->select('pd.*', 'pj.judul', 'pj.komentar', 'pj.status', 'pj.status_dosen1', 'm.name')
        // ->paginate(10);
        $data = DB::table('pengajuan_dospems as pd')
        ->rightJoin('users as m', 'm.id', '=', 'pd.id_mahasiswa')
        ->rightJoin('profiles as pf', 'pf.id', '=', 'm.id_profile')
        ->rightJoin('prodis as p', 'p.id', '=', 'pf.id_prodi')
        ->where(function ($query) {
            $query->where('pd.id_dospem1', '=', auth()->user()->id)
                ->where('pd.status_dosen1', '=', 'diajukan');
        })->orWhere(function ($query) {
            $query->where('pd.id_dospem2', '=', auth()->user()->id)
                ->where('pd.status_dosen2', '=', 'diajukan');
        })
        ->select('pd.*', 'm.name', 'm.username', 'p.name as namaProdi')
        ->paginate(10);
        // return response()->json(['data' => $data], 200);
        return view('pages.dosenScreen.pengajuanbimbingan.index', compact('data'));
    }
    // ACC/TOLAK BIMBINGAN DOSEN 1
    public function pbStore($id, $status) {

        $find = PengajuanDospem::where('id', $id)->first();
        // dd($find, $status);

        $dt = [
            'status_dosen1' => $status
        ];
        $find->update($dt);
        return redirect()->route('pengajuan-bimbingan.dosen.index');
    }

    //** Halaman Bimbingan Diterima */
    // index
    public function bdIndex(){
        $data = DB::table('pengajuan_dospems as pd')
        ->rightJoin('pengajuan_juduls as pj', 'pj.id_mahasiswa', '=', 'pd.id_mahasiswa')
        ->rightJoin('users as m', 'm.id', '=', 'pd.id_mahasiswa')
        ->rightJoin('profiles as pf', 'pf.id', '=', 'm.id_profile')
        ->rightJoin('prodis as p', 'p.id', '=', 'pf.id_prodi')
        ->where(function ($query) {
            $query->where('pd.id_dospem1', '=', auth()->user()->id)
                ->where('pd.status_dosen1', '=', 'diterima');
        })->orWhere(function ($query) {
            $query->where('pd.id_dospem2', '=', auth()->user()->id)
                ->where('pd.status_dosen2', '=', 'diterima');
        })
        ->select('pd.*', 'm.name', 'm.username', 'p.name as namaProdi', 'pj.judul', 'pj.status as statusJudul', 'pj.id as idJudul')
        ->paginate(10);
        return view('pages.dosenScreen.BimbinganDiterima.index', compact('data'));
    }
    // ACC JUDUL
    public function bdStore($id, $status) {

        $find = PengajuanJudul::where('id', $id)->first();
        // dd($find, $status);

        $dt = [
            'status' => $status
        ];
        $find->update($dt);
        return redirect()->route('daftar-bimbingan.dosen.index');
    }
    // Revisi Judul
    public function bdEdit($id){
        $data = PengajuanJudul::where('id', $id)->first();

        return view('pages.dosenScreen.bimbinganDiterima.edit', compact('data'));
    }
    public function bdUpdate($id, Request $request){

        $find = PengajuanJudul::where('id', $id)->first();
        $dt = [
            'komentar' => $request->komentar,
            'status' => "revisi"
        ];
        $find->update($dt);
        return redirect()->route('daftar-bimbingan.dosen.index');

    }

    //** Judul Mahasiswa */
}
