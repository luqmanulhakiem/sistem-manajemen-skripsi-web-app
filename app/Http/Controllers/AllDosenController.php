<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AllDosenController extends Controller
{
    public function index(){
        $auth = User::with('profile')->where('id', auth()->user()->id)->first();

        $data = User::with(['fakultas', 'profile.prodi', 'roles'])
        ->where('id_fakultas', $auth->id_fakultas)
        ->whereHas('roles', function ($query) {
            $query->whereIn('name', ['dosen_pembimbing', 'dosen_kaprodi']);
        })
        ->paginate(10); 

        return view('pages.dosen.index', compact('data'));
    }
}
