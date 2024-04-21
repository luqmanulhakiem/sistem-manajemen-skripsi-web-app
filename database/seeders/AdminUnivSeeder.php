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

        // $profile2 = profile::create();
        // $user2 = User::create([
        //     'id_profile' => $profile2->id,
        //     'name' => 'Admin Universitas 2',
        //     'username' => '2024200420242',
        //     'email' => 'adm_universitas2@gmail.com',
        //     'password' => Hash::make('password'),
        // ]);
        // $user2->assignRole('admn_univ');
        // $user2->syncPermissions('create fakultas');
    }
}
