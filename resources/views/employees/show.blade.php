@extends('master')
@section('page-title', 'Detail Pegawai')
@section('content')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<div class="container mt-5 col-md-8">
    <div class="card shadow">
        <div class="card-header bg-info text-white">
            <h4 class="mb-0">Detail Pegawai</h4>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <tr><th>Nama Lengkap</th><td>{{ $employee->nama_lengkap }}</td></tr>
                <tr><th>Email</th><td>{{ $employee->email }}</td></tr>
                <tr><th>Nomor Telepon</th><td>{{ $employee->nomor_telepon }}</td></tr>
                <tr><th>Tanggal Lahir</th><td>{{ $employee->tanggal_lahir }}</td></tr>
                <tr><th>Alamat</th><td>{{ $employee->alamat }}</td></tr>
                <tr><th>Tanggal Masuk</th><td>{{ $employee->tanggal_masuk }}</td></tr>
                <tr><th>Status</th>
                    <td>
                        @if($employee->status === 'aktif')
                            <span class="badge bg-success">Aktif</span>
                        @else
                            <span class="badge bg-secondary">Nonaktif</span>
                        @endif
                    </td>
                </tr>
                <tr><th>Departemen</th><td>{{ $employee->department ? $employee->department->nama_departemen : '-' }}</td></tr>
                <tr><th>Jabatan</th><td>{{ $employee->position ? $employee->position->nama_jabatan : '-' }}</td></tr>
            </table>
        </div>
        <div class="card-footer text-end">
            <a href="{{ route('employees.index') }}" class="btn btn-secondary">← Kembali</a>
        </div>
    </div>
</div>
@endsection
