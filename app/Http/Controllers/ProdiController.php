<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProdiStoreRequest;
use App\Models\Prodi;
use App\Models\User;
use Illuminate\Http\Request;

class ProdiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $auth = User::with('profile')->where('id', auth()->user()->id)->first();

        $data = Prodi::with('fakultas')
        ->whereHas('fakultas', function ($q) use ($auth) {
            $q->where('id', $auth->id_fakultas);
        })
        ->paginate(10);

        return view('pages.prodi.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.prodi.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProdiStoreRequest $request)
    {
        $data = $request->validated();
        $id = auth()->user()->id;
        $auth = User::with('profile')->where('id', $id)->first();
        $data['id_fakultas'] = $auth->id_fakultas;

        Prodi::create($data);

        return redirect()->route('prodi');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Prodi $prodi, string $id)
    {
        $data = Prodi::findorfail($id);
        return view('pages.prodi.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProdiStoreRequest $request, Prodi $prodi, string $id)
    {
        $data = $request->validated();
        $idUser = auth()->user()->id;
        $auth = User::with('profile')->where('id', $idUser)->first();
        $data['id_fakultas'] = $auth->id_fakultas;

        $find = Prodi::findorfail($id);
        if ($find) {
            $find->update($data);

            return redirect()->route('prodi');
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Prodi $prodi, $id)
    {
        $find = Prodi::findorfail($id);

        $find->delete();

        return redirect()->route('prodi');
    }
}
