<?php

namespace App\Http\Controllers;

use App\Http\Requests\BidangStoreRequest;
use App\Models\Bidang;
use App\Models\User;
use Illuminate\Http\Request;

class BidangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = User::findorfail(auth()->user()->id);

        $data = Bidang::where('id_fakultas', $user->id_fakultas)->paginate(10);

        return view('pages.bidang.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.bidang.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BidangStoreRequest $request)
    {
        $data = $request->validated();
        $user = User::findorfail(auth()->user()->id);
        $data['id_fakultas'] = $user->id_fakultas;
        
        if ($data) {
            Bidang::create([
                'id_fakultas' => $data['id_fakultas'],
                'nama' => $data['nama']
            ]);
    
            return redirect()->route('bidang');
        }else{
            return back()->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Bidang $bidang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = Bidang::findorfail($id);
        return view('pages.bidang.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function destroy(string $id)
    {
        $angkatan = Bidang::findorfail($id);
        $angkatan->delete();

        return redirect()->route('bidang');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function update(BidangStoreRequest $request, string $id)
    {
        $data = Bidang::where('id', $id)->first();

        $dt = $request->validated();

        if ($dt) {
            $data->update($dt);

            return redirect()->route('bidang');
        }
    }
}
