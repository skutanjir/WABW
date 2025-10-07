@extends('master')
@section('page-title', 'Detail Gaji Pegawai')
@section('content')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<div class="container mt-5 col-md-6">
    <div class="card shadow">
        <div class="card-header bg-info text-white">
            <h4 class="mb-0">Detail Gaji Pegawai</h4>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <tr><th>ID</th><td>{{ $salary->id }}</td></tr>
                <tr><th>Nama Pegawai</th><td>{{ $salary->employee ? $salary->employee->nama_lengkap : '-' }}</td></tr>
                <tr><th>Bulan</th><td>{{ $salary->bulan }}</td></tr>
                <tr><th>Gaji Pokok</th><td>Rp {{ number_format($salary->gaji_pokok, 2, ',', '.') }}</td></tr>
                <tr><th>Tunjangan</th><td>Rp {{ number_format($salary->tunjangan, 2, ',', '.') }}</td></tr>
                <tr><th>Potongan</th><td>Rp {{ number_format($salary->potongan, 2, ',', '.') }}</td></tr>
                <tr><th><strong>Total Gaji</strong></th>
                    <td><strong>Rp {{ number_format($salary->total_gaji, 2, ',', '.') }}</strong></td>
                </tr>
            </table>
        </div>
        <div class="card-footer text-end">
            <a href="{{ route('salaries.index') }}" class="btn btn-secondary">← Kembali</a>
        </div>
    </div>
</div>
@endsection
