<?php

namespace Database\Seeders;

use App\Models\Fakultas;
use App\Models\JumlahDospem;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FakultasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['name' => 'Fakultas Teknik'],
            ['name' => 'Fakultas Kesehatan'],
            ['name' => 'Fakultas Agama'],
        ];
        
        Fakultas::insert($data);
        
        $data2 = [
            ['id_fakultas' => '1'],
            ['id_fakultas' => '2'],
            ['id_fakultas' => '3'],
        ];

        JumlahDospem::insert($data2);

    }
}
