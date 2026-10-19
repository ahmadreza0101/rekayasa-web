@extends('Layouts.main')

@section('title', 'Data Mahasiswa')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h1 class="fw-bold text-dark mb-1">Data Mahasiswa</h1>
            <p class="text-secondary mb-0">Selamat datang di halaman manajemen data mahasiswa.</p>
        </div>
        <a href="{{ url('/mahasiswa/create') }}" class="btn btn-primary btn-sm rounded-pill px-3 shadow-sm">
            Tambah Mahasiswa
        </a>
    </div>

    @if ($mahasiswas->isEmpty())
        <div class="alert alert-warning border-0 shadow-sm rounded-3" role="alert">
            Belum ada data mahasiswa yang tersedia.
        </div>
    @else
        <div class="table-responsive rounded-3 shadow-sm">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light text-nowrap">
                    <tr>
                        <th class="py-3 px-4">NIM</th>
                        <th class="py-3">Nama</th>
                        <th class="py-3 text-center">L/P</th>
                        <th class="py-3">Prodi</th>
                        <th class="py-3 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($mahasiswas as $mahasiswa)
                        <tr>
                            <td class="px-4 fw-bold text-primary">{{ $mahasiswa->nim }}</td>
                            <td class="text-dark">{{ $mahasiswa->nama }}</td>
                            <td class="text-center">
                                <span class="badge {{ $mahasiswa->jk == 'L' ? 'bg-info' : 'bg-danger' }} bg-opacity-10 {{ $mahasiswa->jk == 'L' ? 'text-info' : 'text-danger' }} px-2 py-1">
                                    {{ $mahasiswa->jk }}
                                </span>
                            </td>
                            <td class="text-secondary small">{{ $mahasiswa->prodi }}</td>
                            <td class="text-center">
                                <div class="btn-group btn-group-sm shadow-sm rounded-pill overflow-hidden">
                                    <a href="/mahasiswa/edit/{{ $mahasiswa->nim }}" class="btn btn-outline-warning border-0">Edit</a>
                                    <form action="{{ route('mahasiswa.destroy', $mahasiswa->nim) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-outline-danger border-0" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
@endsection