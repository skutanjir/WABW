@extends('master')
@section('page-title', 'Detail Jabatan')
@section('content')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<div class="container mt-5 col-md-6">
    <div class="card shadow">
        <div class="card-header bg-info text-white">
            <h4 class="mb-0">Detail Jabatan</h4>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <tr>
                    <th>ID</th>
                    <td>{{ $position->id }}</td>
                </tr>
                <tr>
                    <th>Nama Jabatan</th>
                    <td>{{ $position->nama_jabatan }}</td>
                </tr>
                <tr>
                    <th>Gaji Pokok</th>
                    <td>Rp {{ number_format($position->gaji_pokok, 2, ',', '.') }}</td>
                </tr>
            </table>
        </div>
        <div class="card-footer text-end">
            <a href="{{ route('positions.index') }}" class="btn btn-secondary">← Kembali</a>
        </div>
    </div>
</div>
@endsection
