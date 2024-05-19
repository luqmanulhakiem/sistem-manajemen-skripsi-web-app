<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use App\Models\User;
use Illuminate\Http\Request;

class JadwalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = User::findorfail(auth()->user()->id);
        $data = Jadwal::where('id_fakultas', $user->id_fakultas)->paginate(30);

        return view('pages.fakultasScreen.jadwal.index', compact('data'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.fakultasScreen.jadwal.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = User::findorfail(auth()->user()->id);
        Jadwal::create([
            'id_fakultas' => $user->id_fakultas,
            'nama' => $request->nama,
            'link' => $request->link,
        ]);

        return redirect()->route('jadwal');
    }

    /**
     * Display the specified resource.
     */
    public function show(Jadwal $jadwal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Jadwal $jadwal, string $id)
    {
        $data = Jadwal::findorfail($id);
        return view('pages.fakultasScreen.jadwal.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Jadwal $jadwal, string $id)
    {
        $data = Jadwal::where('id', $id)->first();
        $data->update([
            'nama' => $request->nama,
            'link' => $request->link,
        ]);
        
        return redirect()->route('jadwal');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Jadwal::findorfail($id);
        $data->delete();
        return redirect()->route('jadwal');
    }
}
