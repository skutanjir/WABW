@extends('master')
@section('page-title', 'Data Absensi')
@section('content')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Data Absensi Pegawai</h2>
        <a href="{{ route('attendance.create') }}" class="btn btn-primary">+ Tambah Absensi</a>
    </div>

    <table class="table table-bordered table-striped text-center align-middle">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Nama Pegawai</th>
                <th>Tanggal</th>
                <th>Waktu Masuk</th>
                <th>Waktu Keluar</th>
                <th>Status Absensi</th>
                <th width="180">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($attendances as $attendance)
            <tr>
                <td>{{ $attendance->id }}</td>
                <td>{{ $attendance->employee ? $attendance->employee->nama_lengkap : '-' }}</td>
                <td>{{ $attendance->tanggal }}</td>
                <td>{{ $attendance->waktu_masuk ?? '-' }}</td>
                <td>{{ $attendance->waktu_keluar ?? '-' }}</td>
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
                <td>
                    <a href="{{ route('attendance.show', $attendance->id) }}" class="btn btn-sm btn-info text-white">Detail</a>
                    <a href="{{ route('attendance.edit', $attendance->id) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('attendance.destroy', $attendance->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus data absensi ini?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="mt-3">
        {{ $attendances->links() }}
    </div>
</div>
@endsection
