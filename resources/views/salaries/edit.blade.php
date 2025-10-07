@extends('master')
@section('page-title', 'Edit Data Gaji')
@section('content')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<div class="container mt-5 col-md-8">
    <div class="card shadow">
        <div class="card-header bg-warning">
            <h4 class="mb-0">Edit Data Gaji Pegawai</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('salaries.update', $salary->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label">Nama Pegawai</label>
                    <select name="karyawan_id" class="form-select" required>
                        @foreach($employees as $employee)
                            <option value="{{ $employee->id }}" {{ $salary->karyawan_id == $employee->id ? 'selected' : '' }}>
                                {{ $employee->nama_lengkap }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Bulan</label>
                    <input type="text" name="bulan" class="form-control" value="{{ $salary->bulan }}" required>
                </div>

                <div class="row mb-3">
                    <div class="col">
                        <label class="form-label">Gaji Pokok</label>
                        <input type="number" id="gaji_pokok" name="gaji_pokok" class="form-control" value="{{ $salary->gaji_pokok }}" required step="0.01">
                    </div>
                    <div class="col">
                        <label class="form-label">Tunjangan</label>
                        <input type="number" id="tunjangan" name="tunjangan" class="form-control" value="{{ $salary->tunjangan }}" step="0.01">
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col">
                        <label class="form-label">Potongan</label>
                        <input type="number" id="potongan" name="potongan" class="form-control" value="{{ $salary->potongan }}" step="0.01">
                    </div>
                    <div class="col">
                        <label class="form-label">Total Gaji</label>
                        <input type="number" id="total_gaji" name="total_gaji" class="form-control bg-light" value="{{ $salary->total_gaji }}" readonly required step="0.01">
                    </div>
                </div>

                <div class="text-end">
                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                    <a href="{{ route('salaries.index') }}" class="btn btn-secondary">Kembali</a>
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
