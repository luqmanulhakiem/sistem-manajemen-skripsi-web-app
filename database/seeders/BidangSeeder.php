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
            ["nama" => "IOT"],
            ["nama" => "Sistem Informasi"],
            ["nama" => "SPK"],
        ];
        Bidang::insert($array);
    }
}
