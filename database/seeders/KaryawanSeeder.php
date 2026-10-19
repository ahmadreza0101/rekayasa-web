<?php

namespace Database\Seeders;

use App\Models\Karyawan;
use Illuminate\Database\Seeder;

class KaryawanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $karyawan = [
            [
                'nama' => 'Reza Ahmad Al Ghifari',
                'jabatan' => 'Frontend Developer',
                'departemen' => 'Teknologi Informasi',
                'no_telp' => '081234567890',
                'email' => 'reza@ptteknologi.co.id',
            ],
            [
                'nama' => 'Sinta Nurhaliza',
                'jabatan' => 'HR Staff',
                'departemen' => 'Human Resources',
                'no_telp' => '082345678901',
                'email' => 'sinta@ptteknologi.co.id',
            ],
            [
                'nama' => 'Budi Santoso',
                'jabatan' => 'Project Manager',
                'departemen' => 'Operasional',
                'no_telp' => '083456789012',
                'email' => 'budi@ptteknologi.co.id',
            ],
        ];

        foreach ($karyawan as $data) {
            Karyawan::firstOrCreate(
                ['email' => $data['email']],
                $data
            );
        }
    }
}
