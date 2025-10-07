@extends('master')
@section('page-title', 'Detail Absensi')
@section('content')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<div class="container mt-5 col-md-6">
    <div class="card shadow">
        <div class="card-header bg-info text-white">
            <h4 class="mb-0">Detail Absensi Pegawai</h4>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <tr><th>ID</th><td>{{ $attendance->id }}</td></tr>
                <tr><th>Nama Pegawai</th><td>{{ $attendance->employee ? $attendance->employee->nama_lengkap : '-' }}</td></tr>
                <tr><th>Tanggal</th><td>{{ $attendance->tanggal }}</td></tr>
                <tr><th>Waktu Masuk</th><td>{{ $attendance->waktu_masuk ?? '-' }}</td></tr>
                <tr><th>Waktu Keluar</th><td>{{ $attendance->waktu_keluar ?? '-' }}</td></tr>
                <tr>
                    <th>Status Absensi</th>
                    <td>
                        @if($attendance->status_absensi == 'hadir')
                            <span class="badge bg-success">Hadir</span>
                        @elseif($attendance->status_absensi == 'izin')
                            <span class="badge bg-warning text-dark">Izin</span>
                        @elseif($attendance->status_absensi == 'sakit')
                            <span class="badge bg-info text-dark">Sakit</span>
                        @else
                            <span class="badge bg-danger">Alpha</span>
                        @endif
                    </td>
                </tr>
            </table>
        </div>
        <div class="card-footer text-end">
            <a href="{{ route('attendance.index') }}" class="btn btn-secondary">← Kembali</a>
        </div>
    </div>
</div>
@endsection
