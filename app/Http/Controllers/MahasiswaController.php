<?php

namespace App\Http\Controllers;

use App\Http\Requests\MahasiswaStoreRequest;
use App\Http\Requests\MahasiswaUpdateRequest;
use App\Models\Angkatan;
use App\Models\Fakultas;
use App\Models\Prodi;
use App\Models\profile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $auth = User::with('profile')->where('id', auth()->user()->id)->first();

        $data = User::with('profile.angkatan', 'profile.prodi')
        ->where('id_fakultas', $auth->id_fakultas)
        // ->whereHas('profile', function ($q) use ($auth) {
        //     $q->where('id_fakultas', $auth->id_fakultas);
        // }) 
        ->whereHas('roles', function ($query) {
            $query->where('name', 'mahasiswa');
        })
        ->paginate(10);

        return view('pages.mahasiswa.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $auth = User::with('profile')->where('id', auth()->user()->id)->first();

        $prodi = Prodi::
        whereHas('fakultas', function ($q) use ($auth) {
            $q->where('id', $auth->id_fakultas);
        })
        ->get();
        $angkatan = Angkatan::get();
        return view('pages.mahasiswa.create', compact(['prodi', 'angkatan']));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MahasiswaStoreRequest $request)
    {
        $data = $request->validated();
        $auth = User::with('profile')->where('id', auth()->user()->id)->first();


        $profile = profile::create([
            'id_prodi' => $data['id_prodi'],
            'id_angkatan' => $data['id_angkatan'],
        ]);

        $user = User::create([
            'id_profile' => $profile->id,
            'id_fakultas' => $auth->id_fakultas,
            'name' => $data['name'],
            'username' => $data['username'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        $user->assignRole($data['role']);

        return redirect()->route('mahasiswa');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $auth = User::with('profile')->where('id', auth()->user()->id)->first();

        $prodi = Prodi::
        whereHas('fakultas', function ($q) use ($auth) {
            $q->where('id', $auth->id_fakultas);
        })
        ->get();
        $angkatan = Angkatan::get();
        $data = User::findorfail($id);
        return view('pages.mahasiswa.edit', compact(['prodi', 'angkatan', 'data']));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(MahasiswaUpdateRequest $request, string $id)
    {
        $data = $request->validated();

        $dt = [
            'id_prodi' => $data['id_prodi'],
            'id_angkatan' => $data['id_angkatan'],
        ];

        $dt2 = [
            'name' => $data['name'],
            'username' => $data['username'],
            'email' => $data['email'],
        ];

        $user = User::findorfail($id);
        $profile = Profile::findorfail($user->id_profile);

        $profile->update($dt);
        $user->update($dt2);

        return redirect()->route('mahasiswa');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::findorfail($id);
        $profile = Profile::findorfail($user->id_profile);
        $profile->delete();
        $user->delete();

        return redirect()->route('mahasiswa');

    }
}
