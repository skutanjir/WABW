@extends('master')
@section('page-title', 'Daftar Pegawai')
@section('content')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Daftar Pegawai</h2>
        <a href="{{ route('employees.create') }}" class="btn btn-primary">+ Tambah Pegawai</a>
    </div>

    <table class="table table-bordered table-striped text-center align-middle">
        <thead class="table-dark">
            <tr>
                <th>Nama Lengkap</th>
                <th>Email</th>
                <th>Nomor Telepon</th>
                <th>Tanggal Lahir</th>
                <th>Tanggal Masuk</th>
                <th>Status</th>
                <th>Departemen</th>
                <th>Jabatan</th>
                <th width="180">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($employees as $employee)
            <tr>
                <td>{{ $employee->nama_lengkap }}</td>
                <td>{{ $employee->email }}</td>
                <td>{{ $employee->nomor_telepon }}</td>
                <td>{{ $employee->tanggal_lahir }}</td>
                <td>{{ $employee->tanggal_masuk }}</td>
                <td>
                    @if($employee->status === 'aktif')
                        <span class="badge bg-success">Aktif</span>
                    @else
                        <span class="badge bg-secondary">Nonaktif</span>
                    @endif
                </td>
                <td>{{ $employee->department ? $employee->department->nama_departemen : '-' }}</td>
                <td>{{ $employee->position ? $employee->position->nama_jabatan : '-' }}</td>
                <td>
                    <a href="{{ route('employees.show', $employee->id) }}" class="btn btn-sm btn-info text-white">Detail</a>
                    <a href="{{ route('employees.edit', $employee->id) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('employees.destroy', $employee->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus pegawai ini?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="mt-3">
        {{ $employees->links() }}
    </div>
</div>
@endsection
