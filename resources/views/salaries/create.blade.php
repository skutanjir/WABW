@extends('master')
@section('page-title', 'Tambah Data Gaji')
@section('content')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<div class="container mt-5 col-md-8">
    <div class="card shadow">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">Tambah Data Gaji Pegawai</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('salaries.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Nama Pegawai</label>
                    <select name="karyawan_id" class="form-select" required>
                        <option value="">-- Pilih Pegawai --</option>
                        @foreach($employees as $employee)
                            <option value="{{ $employee->id }}">{{ $employee->nama_lengkap }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Bulan</label>
                    <input type="text" name="bulan" class="form-control" placeholder="Contoh: Januari 2025" required>
                </div>

                <div class="row mb-3">
                    <div class="col">
                        <label class="form-label">Gaji Pokok</label>
                        <input type="number" id="gaji_pokok" name="gaji_pokok" class="form-control" required step="0.01" value="0">
                    </div>
                    <div class="col">
                        <label class="form-label">Tunjangan</label>
                        <input type="number" id="tunjangan" name="tunjangan" class="form-control" step="0.01" value="0">
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col">
                        <label class="form-label">Potongan</label>
                        <input type="number" id="potongan" name="potongan" class="form-control" step="0.01" value="0">
                    </div>
                    <div class="col">
                        <label class="form-label">Total Gaji</label>
                        <input type="number" id="total_gaji" name="total_gaji" class="form-control bg-light" readonly required step="0.01">
                    </div>
                </div>

                <div class="text-end">
                    <button type="submit" class="btn btn-success">Simpan</button>
                    <a href="{{ route('salaries.index') }}" class="btn btn-secondary">Batal</a>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    const gajiPokok = document.getElementById('gaji_pokok');
    const tunjangan = document.getElementById('tunjangan');
    const potongan = document.getElementById('potongan');
    const totalGaji = document.getElementById('total_gaji');

    function hitungTotal() {
        const pokok = parseFloat(gajiPokok.value) || 0;
        const tunj = parseFloat(tunjangan.value) || 0;
        const pot = parseFloat(potongan.value) || 0;
        const total = pokok + tunj - pot;
        totalGaji.value = total.toFixed(2);
    }

    gajiPokok.addEventListener('input', hitungTotal);
    tunjangan.addEventListener('input', hitungTotal);
    potongan.addEventListener('input', hitungTotal);
</script>
@endsection
