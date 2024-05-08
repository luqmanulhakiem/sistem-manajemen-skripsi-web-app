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

        if ($data['role'] == 'dosen_pembimbing' || $data['role'] == 'dosen_kaprodi') {
            $profile = profile::create([
                'id_prodi' => $data['id_prodi'],
            ]);
        }else{
            $profile = profile::create();
        }


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
        } elseif($data['role'] == 'dosen_pembimbing')
        {
            $find = User::where('id', $user->id)->first();
            $find->update(['phone' => $data['phone']]);
            
            return redirect()->route('dospem');
        } elseif($data['role'] == 'dosen_kaprodi')
        {
            $find = User::where('id', $user->id)->first();
            $find->update(['phone' => $data['phone']]);

            return redirect()->route('kaprodi');
        }
    }

    public function update(EditDosenRequest $request ,string $id)
    {
        $data = $request->validated();

        $find = User::where('id', $id)->first();
        $profile = profile::where('id', $find->id_profile)->first();
        // dd($profile->id_prodi, $data['id_prodi']);
        if ($data['role'] == 'admn_fakultas') {
            $dt2 = [
                'name' => $data['name'], 
                'id_fakultas' => $data['fakultas'],
                'username' => $data['username'],
                'email' => $data['email']
            ];
            // dd($dt2);
        }else{
            $dt2 = [
                'name' => $data['name'], 
                'id_fakultas' => $data['fakultas'],
                'phone' => $data['phone'],
                'username' => $data['username'],
                'email' => $data['email']
            ];
        }
        $find->update($dt2);
        if ($data['role'] == 'dosen_pembimbing' || $data['role'] == 'dosen_kaprodi') {
            $dt = [
                'id_prodi' => $data['id_prodi'],
            ];
            $profile->update($dt);
        }

        if ($data['role'] == 'admn_fakultas') {
            return redirect()->route('admin-fakultas');
        }elseif($data['role'] == 'dosen_pembimbing')
        {
            return redirect()->route('dospem');
        }elseif($data['role'] == 'dosen_kaprodi')
        {
            return redirect()->route('kaprodi');
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
                }elseif($array[0] == 'dosen_pembimbing')
                {
                    return redirect()->route('dospem');
                }elseif($array[0] == 'dosen_kaprodi')
                {
                    return redirect()->route('kaprodi');
                }

            }
        }
    }
}
