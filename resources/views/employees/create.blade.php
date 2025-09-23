<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tambah Pegawai</title>
</head>
<body>
    <h1>Form Pegawai</h1>

    <form action="{{ route('employees.store') }}" method="POST">
        @csrf
        <label>Nama Lengkap:</label>
        <input type="text" name="nama_lengkap" required><br><br>

        <label>Email:</label>
        <input type="email" name="email" required><br><br>

        <label>Nomor Telepon:</label>
        <input type="text" name="nomor_telepon" required><br><br>

        <label>Tanggal Lahir:</label>
        <input type="date" name="tanggal_lahir" required><br><br>

        <label>Alamat:</label>
        <textarea name="alamat" required></textarea><br><br>

        <label>Tanggal Masuk:</label>
        <input type="date" name="tanggal_masuk" required><br><br>

        <label>Status:</label>
<select name="status" required>
    <option value="aktif">Aktif</option>
    <option value="nonaktif">Nonaktif</option>
</select>
<br><br>

        <button type="submit">Simpan</button>
    </form>
</body>
</html>
