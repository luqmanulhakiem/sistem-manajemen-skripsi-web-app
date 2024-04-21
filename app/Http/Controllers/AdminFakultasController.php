<?php

namespace App\Http\Controllers;

use App\Models\Fakultas;
use App\Models\User;
use Illuminate\Http\Request;

class AdminFakultasController extends Controller
{
    public function index()
    {
        $data = User::with('fakultas')->whereHas('roles', function ($query) {
            $query->where('name', 'admn_fakultas');
        })->paginate(10);

        return view('pages.dataAdminFakultas.index', compact('data'));
    }
    
    public function create()
    {
        $fakultas = Fakultas::get();
        return view('pages.dataAdminFakultas.create', compact('fakultas'));
    }
    
    public function edit(string $id)
    {
        $data = User::findorfail($id);
        $fakultas = Fakultas::get();
        return view('pages.dataAdminFakultas.edit', compact(['fakultas', 'data']));
    }
}
