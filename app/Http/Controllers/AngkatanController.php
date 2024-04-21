<?php

namespace App\Http\Controllers;

use App\Http\Requests\AngkatanStoreRequest;
use App\Models\Angkatan;
use Illuminate\Http\Request;

class AngkatanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Angkatan::paginate(10);

        return view('pages.angkatan.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.angkatan.create');
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AngkatanStoreRequest $request)
    {
        $data = $request->validated();
        
        if ($data) {
            Angkatan::create([
                'name' => $data['name']
            ]);
    
            return redirect()->route('angkatan');
        }else{
            return back()->withInput();
        }
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Angkatan $angkatan, string $id)
    {
        $data = Angkatan::findorfail($id);
        return view('pages.angkatan.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AngkatanStoreRequest $request, Angkatan $angkatan, string $id)
    {
        $data = Angkatan::where('id', $id)->first();

        $dt = $request->validated();

        if ($dt) {
            $data->update($dt);

            return redirect()->route('angkatan');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Angkatan $angkatan, string $id)
    {
        $angkatan = Angkatan::findorfail($id);
        $angkatan->delete();

        return redirect()->route('angkatan');
    }
}
