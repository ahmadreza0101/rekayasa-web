<?php

namespace Tests\Feature;

use App\Models\Karyawan;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class KaryawanPageTest extends TestCase
{
    use RefreshDatabase;

    public function test_karyawan_page_displays_employee_list_from_database(): void
    {
        Karyawan::create([
            'nama' => 'Reza Ahmad',
            'jabatan' => 'Frontend Developer',
            'departemen' => 'Teknologi Informasi',
            'no_telp' => '081234567890',
            'email' => 'reza@company.com',
        ]);

        $response = $this->get('/karyawan');

        $response->assertOk();
        $response->assertSee('Reza Ahmad');
        $response->assertSee('Frontend Developer');
    }
}
