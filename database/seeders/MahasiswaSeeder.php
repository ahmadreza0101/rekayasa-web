<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MahasiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('mahasiswas')->insert([
        [
        'nim' => '1234567890',
        'nama' => 'John Doe',
        'jk' => 'L',
        'prodi'=> 'Sastra Mesin',
        'no_telp' => '085174410132',
        'Alamat' => 'Jl. Raya Serang KM. 15, Cikupa, Tangerang, Banten',
        'Created_at' => now(),
        'updated_at' => now(),
        
        ],
        ]);
    }
}
