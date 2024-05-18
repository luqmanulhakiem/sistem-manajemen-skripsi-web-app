<?php

namespace Database\Seeders;

use App\Models\Bidang;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BidangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $array = [
            ["id_fakultas" => 1,"nama" => "IOT"],
            ["id_fakultas" => 1,"nama" => "Sistem Informasi"],
            ["id_fakultas" => 1,"nama" => "SPK"],
            ["id_fakultas" => 3,"nama" => "Agama"],
        ];
        Bidang::insert($array);
    }
}
