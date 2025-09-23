<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Pegawai</title>
</head>
<body>
    <h1>Edit Pegawai</h1>

    <form action="{{ route('employees.update', $employee->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label>Nama Lengkap:</label>
        <input type="text" name="nama_lengkap" value="{{ $employee->nama_lengkap }}" required><br><br>

        <label>Email:</label>
        <input type="email" name="email" value="{{ $employee->email }}" required><br><br>

        <label>Nomor Telepon:</label>
        <input type="text" name="nomor_telepon" value="{{ $employee->nomor_telepon }}" required><br><br>

        <label>Tanggal Lahir:</label>
        <input type="date" name="tanggal_lahir" value="{{ $employee->tanggal_lahir }}" required><br><br>

        <label>Alamat:</label>
        <textarea name="alamat" required>{{ $employee->alamat }}</textarea><br><br>

        <label>Tanggal Masuk:</label>
        <input type="date" name="tanggal_masuk" value="{{ $employee->tanggal_masuk }}" required><br><br>

        <label>Status:</label>
<select name="status" required>
    <option value="aktif" {{ $employee->status == 'aktif' ? 'selected' : '' }}>Aktif</option>
    <option value="nonaktif" {{ $employee->status == 'nonaktif' ? 'selected' : '' }}>Nonaktif</option>
</select>
<br><br>

        <button type="submit">Simpan</button>
    </form>
</body>
</html>

