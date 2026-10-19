<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    
    public function index()
    {
        $mahasiswas = Mahasiswa::orderBy('nim', 'asc')->get();
        return view('Page.daftar', [
            'title' => 'Daftar Mahasiswa',
            'mahasiswas' => $mahasiswas
        ]);
    }

  
    public function create()
    {
        return view('Page.create', [
            'title' => 'Tambah Mahasiswa'
        ]);
    }

  
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nim' => 'required|unique:mahasiswas,nim|max:20',
            'nama' => 'required|max:100',
            'jk' => 'required|in:L,P',
            'prodi' => 'required|max:100',
            'no_telp' => 'required|max:20',
            'email' => 'required|email|unique:mahasiswas,email|max:100',
            'alamat' => 'required',
        ]);

        Mahasiswa::create($validated);

        return redirect()->route('mahasiswa.index')->with('success', 'Data mahasiswa berhasil ditambahkan!');
    }

    
    public function edit(string $nim)
    {
        $mahasiswa = Mahasiswa::findOrFail($nim);
        return view('Page.edit', [
            'title' => 'Edit Mahasiswa',
            'mahasiswa' => $mahasiswa
        ]);
    }

 
    public function update(Request $request, string $nim)
    {
        $mahasiswa = Mahasiswa::findOrFail($nim);

        $validated = $request->validate([
            'nama' => 'required|max:100',
            'jk' => 'required|in:L,P',
            'prodi' => 'required|max:100',
            'no_telp' => 'required|max:20',
            'email' => 'required|email|max:100|unique:mahasiswas,email,' . $nim . ',nim',
            'alamat' => 'required',
        ]);

        $mahasiswa->update($validated);

        return redirect()->route('mahasiswa.index')->with('success', 'Data mahasiswa berhasil diperbarui!');
    }

  
    public function destroy(string $nim)
    {
        $mahasiswa = Mahasiswa::findOrFail($nim);
        $mahasiswa->delete();

        return redirect()->route('mahasiswa.index')->with('success', 'Data mahasiswa berhasil dihapus!');
    }
}
