@extends('Layouts.main')

@section('content')
    <div class="mb-4">
        <h1 class="fw-bold text-dark mb-1">Edit Mahasiswa</h1>
        <p class="text-secondary">Silakan perbarui data mahasiswa di bawah ini.</p>
    </div>

    <div class="card border-0 shadow-sm rounded-4">
        <div class="card-body p-4">
            <form action="{{ route('mahasiswa.update', $mahasiswa->nim) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label fw-bold">NIM</label>
                        <input type="text" class="form-control rounded-pill bg-light" value="{{ $mahasiswa->nim }}" readonly disabled>
                        <small class="text-muted">NIM tidak dapat diubah.</small>
                    </div>

                    <div class="col-md-6">
                        <label for="nama" class="form-label fw-bold">Nama Lengkap</label>
                        <input type="text" class="form-control rounded-pill @error('nama') is-invalid @enderror" id="nama" name="nama" value="{{ old('nama', $mahasiswa->nama) }}" placeholder="Masukkan Nama Lengkap">
                        @error('nama')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label class="form-label fw-bold d-block">Jenis Kelamin</label>
                        <div class="form-check form-check-inline mt-2">
                            <input class="form-check-input" type="radio" name="jk" id="jk_l" value="L" {{ old('jk', $mahasiswa->jk) == 'L' ? 'checked' : '' }}>
                            <label class="form-check-label" for="jk_l">Laki-laki</label>
                        </div>
                        <div class="form-check form-check-inline mt-2">
                            <input class="form-check-input" type="radio" name="jk" id="jk_p" value="P" {{ old('jk', $mahasiswa->jk) == 'P' ? 'checked' : '' }}>
                            <label class="form-check-label" for="jk_p">Perempuan</label>
                        </div>
                        @error('jk')
                            <div class="text-danger small mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label for="prodi" class="form-label fw-bold">Program Studi</label>
                        <select class="form-select rounded-pill @error('prodi') is-invalid @enderror" id="prodi" name="prodi">
                            <option value="">Pilih Program Studi</option>
                            <option value="S1 Sistem Informasi" {{ old('prodi', $mahasiswa->prodi) == 'S1 Sistem Informasi' ? 'selected' : '' }}>S1 Sistem Informasi</option>
                            <option value="S1 Teknik Informatika" {{ old('prodi', $mahasiswa->prodi) == 'S1 Teknik Informatika' ? 'selected' : '' }}>S1 Teknik Informatika</option>
                            <option value="S1 Teknik Elektro" {{ old('prodi', $mahasiswa->prodi) == 'S1 Teknik Elektro' ? 'selected' : '' }}>S1 Teknik Elektro</option>
                        </select>
                        @error('prodi')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label for="no_telp" class="form-label fw-bold">No. Telepon</label>
                        <input type="text" class="form-control rounded-pill @error('no_telp') is-invalid @enderror" id="no_telp" name="no_telp" value="{{ old('no_telp', $mahasiswa->no_telp) }}" placeholder="0812xxxx">
                        @error('no_telp')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label for="email" class="form-label fw-bold">Email</label>
                        <input type="email" class="form-control rounded-pill @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email', $mahasiswa->email) }}" placeholder="nama@email.com">
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-12">
                        <label for="alamat" class="form-label fw-bold">Alamat</label>
                        <textarea class="form-control rounded-4 @error('alamat') is-invalid @enderror" id="alamat" name="alamat" rows="3" placeholder="Masukkan alamat lengkap">{{ old('alamat', $mahasiswa->alamat) }}</textarea>
                        @error('alamat')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="mt-4 d-flex gap-2">
                    <button type="submit" class="btn btn-warning rounded-pill px-4 shadow-sm fw-bold">Perbarui Data</button>
                    <a href="{{ route('mahasiswa.index') }}" class="btn btn-light rounded-pill px-4 border">Batal</a>
                </div>
            </form>
        </div>
    </div>
@endsection
