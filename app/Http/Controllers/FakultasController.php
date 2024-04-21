<?php

namespace App\Http\Controllers;

use App\Http\Requests\FakultasStoreRequest;
use App\Models\Fakultas;
use App\Models\JumlahDospem;
use App\Models\Prodi;
use Illuminate\Http\Request;

class FakultasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Fakultas::paginate(10);

        return view('pages.fakultas.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.fakultas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(FakultasStoreRequest $request)
    {
        $data = $request->validated();
        
        if ($data) {
            $fakultas = Fakultas::create([
                'name' => $data['name']
            ]);

            JumlahDospem::create([
                'id_fakultas' => $fakultas->id,
            ]);
    
            return redirect()->route('fakultas');
        }else{
            return back()->withInput();
        }
        
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Fakultas $fakultas, string $id)
    {
        $data = Fakultas::findorfail($id);
        return view('pages.fakultas.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(FakultasStoreRequest $request, Fakultas $fakultas, string $id)
    {
        $data = Fakultas::where('id', $id)->first();

        $dt = $request->validated();

        if ($dt) {
            $data->update($dt);

            return redirect()->route('fakultas');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Fakultas $fakultas, string $id)
    {
        $fakultas = Fakultas::findorfail($id);
        Prodi::where('id_fakultas', $id)->delete();
        $fakultas->delete();

        return redirect()->route('fakultas');
    }
}
