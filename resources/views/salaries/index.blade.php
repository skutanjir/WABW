@extends('master')
@section('page-title', 'Data Gaji Pegawai')
@section('content')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Data Gaji Pegawai</h2>
        <a href="{{ route('salaries.create') }}" class="btn btn-primary">+ Tambah Gaji</a>
    </div>

    <table class="table table-bordered table-striped text-center align-middle">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Nama Pegawai</th>
                <th>Bulan</th>
                <th>Gaji Pokok</th>
                <th>Tunjangan</th>
                <th>Potongan</th>
                <th>Total Gaji</th>
                <th width="180">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($salaries as $salary)
            <tr>
                <td>{{ $salary->id }}</td>
                <td>{{ $salary->employee ? $salary->employee->nama_lengkap : '-' }}</td>
                <td>{{ $salary->bulan }}</td>
                <td>Rp {{ number_format($salary->gaji_pokok, 2, ',', '.') }}</td>
                <td>Rp {{ number_format($salary->tunjangan, 2, ',', '.') }}</td>
                <td>Rp {{ number_format($salary->potongan, 2, ',', '.') }}</td>
                <td><strong>Rp {{ number_format($salary->total_gaji, 2, ',', '.') }}</strong></td>
                <td>
                    <a href="{{ route('salaries.show', $salary->id) }}" class="btn btn-sm btn-info text-white">Detail</a>
                    <a href="{{ route('salaries.edit', $salary->id) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('salaries.destroy', $salary->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus data gaji ini?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="mt-3">
        {{ $salaries->links() }}
    </div>
</div>
@endsection
