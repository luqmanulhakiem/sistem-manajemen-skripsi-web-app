<?php

namespace Database\Seeders;

use App\Models\Prodi;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProdiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['id_fakultas' => '1' ,'name' => 'Teknik Informatika'],
            ['id_fakultas' => '1' ,'name' => 'Sistem Informasi'],
        ];

        Prodi::insert($data);
    }
}
