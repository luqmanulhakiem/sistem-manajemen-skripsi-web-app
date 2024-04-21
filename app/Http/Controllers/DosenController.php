<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddDosenRequest;
use App\Http\Requests\EditDosenRequest;
use App\Models\profile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class DosenController extends Controller
{   
    public function createDosen(AddDosenRequest $request){
        $data = $request->validated();

        $profile = profile::create();

        $user = User::create([
            'id_profile' => $profile->id,
            'id_fakultas' => $data['fakultas'],
            'name' => $data['name'],
            'username' => $data['username'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        $user->assignRole($data['role']);

        if ($data['role'] == 'admn_fakultas') {
            return redirect()->route('admin-fakultas');
        }
    }

    public function update(EditDosenRequest $request ,string $id)
    {
        $data = $request->validated();

        $find = User::where('id', $id)->first();

        $find->update($data);

        if ($data['role'] == 'admn_fakultas') {
            return redirect()->route('admin-fakultas');
        }
    }

    public function deleteDosen(string $id)
    {
        $user = User::findorfail($id);
        $array = $user->roles->pluck('name')->toArray();
        if ($user) {
            $profile = profile::findorfail($user->id_profile);
            if ($profile) {
                $profile->delete();
                $user->delete();

                if ($array[0] == 'admn_fakultas') {
                    return redirect()->route('admin-fakultas');
                }

            }
        }
    }
}
