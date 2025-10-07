@extends('master')
@section('page-title', 'Tambah Jabatan')
@section('content')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<div class="container mt-5 col-md-6">
    <div class="card shadow">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">Tambah Jabatan Baru</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('positions.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="nama_jabatan" class="form-label">Nama Jabatan</label>
                    <input type="text" name="nama_jabatan" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="gaji_pokok" class="form-label">Gaji Pokok</label>
                    <input type="number" name="gaji_pokok" class="form-control" required step="0.01">
                </div>
                <div class="text-end">
                    <button type="submit" class="btn btn-success">Simpan</button>
                    <a href="{{ route('positions.index') }}" class="btn btn-secondary">Batal</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
