@extends('master')
@section('page-title', 'Daftar Jabatan')
@section('content')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Daftar Jabatan</h2>
        <a href="{{ route('positions.create') }}" class="btn btn-primary">+ Tambah Jabatan</a>
    </div>

    <table class="table table-bordered table-striped text-center align-middle">
        <thead class="table-dark">
            <tr>
                <th width="60">ID</th>
                <th>Nama Jabatan</th>
                <th>Gaji Pokok</th>
                <th width="180">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($positions as $position)
            <tr>
                <td>{{ $position->id }}</td>
                <td>{{ $position->nama_jabatan }}</td>
                <td>Rp {{ number_format($position->gaji_pokok, 2, ',', '.') }}</td>
                <td>
                    <a href="{{ route('positions.show', $position->id) }}" class="btn btn-sm btn-info text-white">Detail</a>
                    <a href="{{ route('positions.edit', $position->id) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('positions.destroy', $position->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus jabatan ini?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="mt-3">
        {{ $positions->links() }}
    </div>
</div>
@endsection
