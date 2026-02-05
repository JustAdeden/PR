<?php include 'koneksi.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Tambah Santri</title>
</head>
<body>

<h2>Tambah Data Santri</h2>

<form method="post">
    Nama <br>
    <input type="text" name="nama" required><br><br>

    Kelas <br>
    <input type="text" name="kelas" required><br><br>

    Alamat <br>
    <textarea name="alamat" required></textarea><br><br>

    Nilai <br>
    <input type="number" name="nilai" min="0" max="100" required><br><br>

    <button type="submit" name="simpan">Simpan</button>
</form>

<?php
if (isset($_POST['simpan'])) {
    mysqli_query($koneksi, "
        INSERT INTO santri (nama, kelas, alamat, nilai)
        VALUES (
            '$_POST[nama]',
            '$_POST[kelas]',
            '$_POST[alamat]',
            '$_POST[nilai]'
        )
    ");
    header("location:index.php");
}
?>

</body>
</html>
