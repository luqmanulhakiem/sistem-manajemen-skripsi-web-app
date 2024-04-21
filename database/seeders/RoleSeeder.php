<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Role
        $adm_univ = Role::create([
            'name' => 'admn_univ',
        ]);
        $adm_fakultas = Role::create([
            'name' => 'admn_fakultas',
        ]);
        Role::create([
            'name' => 'dosen_pembimbing',
        ]);
        Role::create([
            'name' => 'dosen_penguji',
        ]);
        Role::create([
            'name' => 'dosen_kaprodi',
        ]);
        Role::create([
            'name' => 'mahasiswa',
        ]);

        // Permission
        $addAdmnFakultas = Permission::create(['name' => 'add admn_fakultas']);
        Permission::create(['name' => 'create fakultas']);

        // Sign Permission To Role
        $adm_univ->givePermissionTo($addAdmnFakultas);
    }
}
