@extends('master')
@section('page-title', 'Daftar Departemen')
@section('content')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Daftar Departemen</h2>
        <a href="{{ route('departments.create') }}" class="btn btn-primary">+ Tambah Departemen</a>
    </div>

    <table class="table table-bordered table-striped align-middle text-center">
        <thead class="table-dark">
            <tr>
                <th width="80">ID</th>
                <th>Nama Departemen</th>
                <th width="200">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($departments as $department)
            <tr>
                <td>{{ $department->id }}</td>
                <td>{{ $department->nama_departemen }}</td>
                <td>
                    <a href="{{ route('departments.show', $department->id) }}" class="btn btn-sm btn-info text-white">Detail</a>
                    <a href="{{ route('departments.edit', $department->id) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('departments.destroy', $department->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus departemen ini?')">
                            Hapus
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="mt-3">
        {{ $departments->links() }}
    </div>
</div>
@endsection
