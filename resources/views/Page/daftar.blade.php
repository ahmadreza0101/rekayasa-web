@extends('Layouts.main')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h1 class="fw-bold text-dark mb-1">Daftar Mahasiswa</h1>
            <p class="text-secondary mb-0">Manajemen data mahasiswa PT Teknologi Nusantara.</p>
        </div>
        <a href="{{ route('mahasiswa.create') }}" class="btn btn-primary rounded-pill px-4 shadow-sm">
            <i class="bi bi-plus-lg me-2"></i>Tambah Mahasiswa
        </a>
    </div>

    @if (session('success'))
        <div class="alert alert-success border-0 shadow-sm rounded-3 mb-4" role="alert">
            <div class="d-flex align-items-center">
                <i class="bi bi-check-circle-fill fs-5 me-3"></i>
                <div>{{ session('success') }}</div>
            </div>
        </div>
    @endif

    @if ($mahasiswas->isEmpty())
        <div class="text-center py-5 bg-light rounded-4 border border-dashed">
            <i class="bi bi-inbox text-muted display-1"></i>
            <p class="mt-3 text-secondary lead">Belum ada data mahasiswa yang tersedia.</p>
            <a href="{{ route('mahasiswa.create') }}" class="btn btn-outline-primary btn-sm mt-2 rounded-pill">Tambah Sekarang</a>
        </div>
    @else
        <div class="table-responsive rounded-4 shadow-sm border-0">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-dark">
                    <tr>
                        <th class="py-3 px-4 border-0">NIM</th>
                        <th class="py-3 border-0">Nama Lengkap</th>
                        <th class="py-3 text-center border-0">L/P</th>
                        <th class="py-3 border-0">Program Studi</th>
                        <th class="py-3 border-0">Email</th>
                        <th class="py-3 text-center border-0">Aksi</th>
                    </tr>
                </thead>
                <tbody class="bg-white">
                    @foreach ($mahasiswas as $mahasiswa)
                        <tr>
                            <td class="px-4 fw-bold text-primary">{{ $mahasiswa->nim }}</td>
                            <td class="text-dark fw-medium">{{ $mahasiswa->nama }}</td>
                            <td class="text-center">
                                <span class="badge {{ $mahasiswa->jk == 'L' ? 'bg-info' : 'bg-danger' }} bg-opacity-10 {{ $mahasiswa->jk == 'L' ? 'text-info' : 'text-danger' }} px-3 py-2 rounded-pill">
                                    {{ $mahasiswa->jk == 'L' ? 'Laki-laki' : 'Perempuan' }}
                                </span>
                            </td>
                            <td class="text-secondary small">{{ $mahasiswa->prodi }}</td>
                            <td class="text-muted small">{{ $mahasiswa->email }}</td>
                            <td class="text-center">
                                <div class="d-flex justify-content-center gap-2">
                                    <a href="{{ route('mahasiswa.edit', $mahasiswa->nim) }}" class="btn btn-sm btn-outline-warning rounded-pill px-3">
                                        Edit
                                    </a>
                                    <form action="{{ route('mahasiswa.destroy', $mahasiswa->nim) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-outline-danger rounded-pill px-3" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                            Hapus
                                        </button>
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
