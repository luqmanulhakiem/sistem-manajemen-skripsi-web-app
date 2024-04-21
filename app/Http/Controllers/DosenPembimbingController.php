<?php

namespace App\Http\Controllers;

use App\Models\Prodi;
use App\Models\User;
use Illuminate\Http\Request;

class DosenPembimbingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $auth = User::with('profile')->where('id', auth()->user()->id)->first();

        $data = User::with('fakultas', 'profile.prodi')
        ->where('id_fakultas', $auth->id_fakultas)
        ->whereHas('roles', function ($query) {
            $query->where('name', 'dosen_pembimbing');
        })->paginate(10);

        return view('pages.dosenPembimbing.index', compact('data'));
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
        return view('pages.dosenPembimbing.create', compact('prodi', 'auth'));
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
        $data = User::findorfail($id);
        return view('pages.dosenPembimbing.edit', compact('prodi', 'auth', 'data'));
    }
}
