@extends('master')
@section('page-title', 'Tambah Absensi')
@section('content')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<div class="container mt-5 col-md-8">
    <div class="card shadow">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">Tambah Data Absensi</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('attendance.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Nama Pegawai</label>
                    <select name="karyawan_id" class="form-select" required>
                        <option value="">-- Pilih Pegawai --</option>
                        @foreach($employees as $employee)
                            <option value="{{ $employee->id }}">{{ $employee->nama_lengkap }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Tanggal</label>
                    <input type="date" name="tanggal" class="form-control" required>
                </div>

                <div class="row mb-3">
                    <div class="col">
                        <label class="form-label">Waktu Masuk</label>
                        <input type="time" name="waktu_masuk" class="form-control">
                    </div>
                    <div class="col">
                        <label class="form-label">Waktu Keluar</label>
                        <input type="time" name="waktu_keluar" class="form-control">
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label">Status Absensi</label>
                    <select name="status_absensi" class="form-select" required>
                        <option value="hadir">Hadir</option>
                        <option value="izin">Izin</option>
                        <option value="sakit">Sakit</option>
                        <option value="alpha">Alpha</option>
                    </select>
                </div>

                <div class="text-end">
                    <button type="submit" class="btn btn-success">Simpan</button>
                    <a href="{{ route('attendance.index') }}" class="btn btn-secondary">Batal</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
