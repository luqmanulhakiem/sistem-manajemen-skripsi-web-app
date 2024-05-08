<?php

namespace App\Imports;

use App\Models\profile;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class MahasiswaImport implements ToModel, WithStartRow
{
    /**
     * @return int
     */
    public function startRow(): int
    {
        return 2;
    }
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        // dd($row);
        $profile = profile::create([
            'id_prodi' => (int) $row[0],
            'id_angkatan' => (int) $row[1],
        ]);

        $user = User::create([
            'id_profile' => $profile->id,
            'id_fakultas' => (int) $row[2],
            'name' => $row[3],
            'username' => $row[4],
            'email' => $row[5],
            'password' => Hash::make('mhs12345'),
        ]);

        $user->assignRole('mahasiswa');

        // return new profile([
        //     'id_prodi' => (int) $row[0],
        //     'id_angkatan' => (int) $row[1],
        // ]);
        // return new User([
        //     'id_fakultas' => (int) $row[2],
        //     'name' => (int) $row[3],
        //     'username' => (int) $row[4],
        //     'email' => (int) $row[5],
        // ]);
        return $user;
    }
    public function rules(): array
    {
        return [
        'email' => 'unique:users,email',
        ];
    }

}
