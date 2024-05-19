<?php

namespace App\Http\Controllers;

use App\Models\Bimbingan;
use App\Models\BimbinganItem;
use Illuminate\Http\Request;

class BimbinganItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(string $idMhs)
    {
        $bimbingan = Bimbingan::where('id_mahasiswa', $idMhs)
        ->where('id_dosen', auth()->user()->id)
        ->first();
        return view('pages.dosenScreen.BimbinganItem.create', compact('bimbingan'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request,string $idBimbingan, string $idMhs)
    {
        // return response()->json($idBimbingan);
        BimbinganItem::create([
            'id_bimbingan' => $idBimbingan,
            'tgl_bimbingan' => $request->tanggal,
            'catatan' => $request->catatan,
        ]);

        return redirect()->route('bimbingan-mahasiswa.dosen.index', ['id' => $idMhs]);
    }

    /**
     * Display the specified resource.
     */
    public function show(BimbinganItem $bimbinganItem)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BimbinganItem $bimbinganItem)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BimbinganItem $bimbinganItem)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BimbinganItem $bimbinganItem)
    {
        //
    }
}
