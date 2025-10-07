@extends('master')
@section('page-title', 'Edit Absensi')
@section('content')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<div class="container mt-5 col-md-8">
    <div class="card shadow">
        <div class="card-header bg-warning">
            <h4 class="mb-0">Edit Data Absensi</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('attendance.update', $attendance->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label">Nama Pegawai</label>
                    <select name="karyawan_id" class="form-select" required>
                        @foreach($employees as $employee)
                            <option value="{{ $employee->id }}" {{ $attendance->karyawan_id == $employee->id ? 'selected' : '' }}>
                                {{ $employee->nama_lengkap }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Tanggal</label>
                    <input type="date" name="tanggal" value="{{ $attendance->tanggal }}" class="form-control" required>
                </div>

                <div class="row mb-3">
                    <div class="col">
                        <label class="form-label">Waktu Masuk</label>
                        <input type="time" name="waktu_masuk" value="{{ $attendance->waktu_masuk }}" class="form-control">
                    </div>
                    <div class="col">
                        <label class="form-label">Waktu Keluar</label>
                        <input type="time" name="waktu_keluar" value="{{ $attendance->waktu_keluar }}" class="form-control">
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label">Status Absensi</label>
                    <select name="status_absensi" class="form-select" required>
                        <option value="hadir" {{ $attendance->status_absensi == 'hadir' ? 'selected' : '' }}>Hadir</option>
                        <option value="izin" {{ $attendance->status_absensi == 'izin' ? 'selected' : '' }}>Izin</option>
                        <option value="sakit" {{ $attendance->status_absensi == 'sakit' ? 'selected' : '' }}>Sakit</option>
                        <option value="alpha" {{ $attendance->status_absensi == 'alpha' ? 'selected' : '' }}>Alpha</option>
                    </select>
                </div>

                <div class="text-end">
                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                    <a href="{{ route('attendance.index') }}" class="btn btn-secondary">Kembali</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
