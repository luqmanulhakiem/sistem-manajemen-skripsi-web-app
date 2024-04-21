<?php

namespace App\Http\Controllers;

use App\Models\JumlahDospem;
use App\Models\User;
use Illuminate\Http\Request;

class JumlahDospemController extends Controller
{
    public function index()
    {
        $auth = User::with('profile')->where('id', auth()->user()->id)->first();

        $data = JumlahDospem::where('id_fakultas', $auth->id_fakultas)->first();

        return view('pages.jumlahDospem.index', compact('data'));
    }
    public function update(Request $request)
    {
        $dt = [
            'jumlah' => $request->jumlah
        ];
        $auth = User::with('profile')->where('id', auth()->user()->id)->first();

        $data = JumlahDospem::where('id_fakultas', $auth->id_fakultas)->first();
        $data->update($dt);

        return redirect()->route('jumlah-dospem');

    }

}
