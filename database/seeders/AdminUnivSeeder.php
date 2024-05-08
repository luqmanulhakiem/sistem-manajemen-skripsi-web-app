<?php

namespace Database\Seeders;

use App\Models\profile;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUnivSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $profile = profile::create();
        $user = User::create([
            'id_profile' => $profile->id,
            'name' => 'Admin Universitas',
            'username' => '202420042024',
            'email' => 'adm_universitas@gmail.com',
            'password' => Hash::make('password'),
        ]);
        $user->assignRole('admn_univ');

        $profile2 = profile::create();
        $user2 = User::create([
            'id_profile' => $profile2->id,
            'id_fakultas' => 1,
            'name' => 'Admin Fakultas Teknik',
            'username' => '0139123091',
            'email' => 'tanti@gmail.com',
            'password' => Hash::make('password'),
        ]);
        $user2->assignRole('admn_fakultas');
        // $user2->syncPermissions('create fakultas');
        
        $profile3 = profile::create([
            'id_prodi' => 1,
        ]);
        $user3 = User::create([
            'id_profile' => $profile3->id,
            'id_fakultas' => 1,
            'name' => 'Rofi',
            'username' => '10240193109',
            'email' => 'rofi@gmail.com',
            'phone' => '08332131',
            'password' => Hash::make('password'),
        ]);
        $user3->assignRole('dosen_pembimbing');
        
        $profile4 = profile::create([
            'id_prodi' => 1,
            'id_angkatan' => 1,
        ]);
        $user4 = User::create([
            'id_profile' => $profile4->id,
            'id_fakultas' => 1,
            'name' => 'Fiful',
            'username' => '202020203103021',
            'email' => 'fiful@gmail.com',
            'password' => Hash::make('mhs12345'),
        ]);
        $user4->assignRole('mahasiswa');
    }
}
