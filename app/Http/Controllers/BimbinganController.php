<?php

namespace App\Http\Controllers;

use App\Models\Bimbingan;
use App\Models\BimbinganItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BimbinganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function indexDosen(string $id)
    {
        $user = DB::table('users as u')
        ->join('bimbingans as b', 'b.id_mahasiswa', '=', 'u.id')
        ->join('pengajuan_juduls as pj', 'pj.id_mahasiswa', '=', 'u.id')
        ->where('u.id', '=', $id)
        ->where('b.id_dosen', '=', auth()->user()->id)
        ->select('u.*', 'pj.judul', 'b.id as idBimbingan')
        ->first();
        

        $item = BimbinganItem::where('id_bimbingan', $user->idBimbingan)->get();
        // return response()->json($user);
        return view('pages.dosenScreen.bimbinganRiwayat.index', compact('user', 'item'));
    }

    public function indexMhs(string $id){
        $user = DB::table('users as u')
        ->join('bimbingans as b', 'b.id_dosen', '=', 'u.id')
        ->join('pengajuan_juduls as pj', 'pj.id_mahasiswa', '=', 'b.id_mahasiswa')
        ->where('pj.id_mahasiswa', '=', auth()->user()->id)
        ->where('u.id', '=', $id)
        ->select('u.*', 'pj.judul', 'b.id as idBimbingan')
        ->first();

        $item = BimbinganItem::where('id_bimbingan', $user->idBimbingan)->get();
        return view('pages.mahasiswaScreen.bimbinganRiwayat.index', compact('user', 'item'));


    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Bimbingan $bimbingan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Bimbingan $bimbingan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Bimbingan $bimbingan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Bimbingan $bimbingan)
    {
        //
    }
}
