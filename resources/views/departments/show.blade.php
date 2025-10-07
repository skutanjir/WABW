@extends('master')
@section('page-title', 'Detail Departemen')
@section('content')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<div class="container mt-5 col-md-6">
    <div class="card shadow">
        <div class="card-header bg-info text-white">
            <h4 class="mb-0">Detail Departemen</h4>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <tr>
                    <th width="40%">ID</th>
                    <td>{{ $department->id }}</td>
                </tr>
                <tr>
                    <th>Nama Departemen</th>
                    <td>{{ $department->nama_departemen }}</td>
                </tr>
            </table>
        </div>
        <div class="card-footer text-end">
            <a href="{{ route('departments.index') }}" class="btn btn-secondary">← Kembali</a>
        </div>
    </div>
</div>
@endsection
