<?php
include 'koneksi.php';
$id = $_GET['id'];
$data = mysqli_query($koneksi, "SELECT * FROM santri WHERE id='$id'");
$d = mysqli_fetch_array($data);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Santri</title>
</head>
<body>

<h2>Edit Data Santri</h2>

<form method="post">
    Nama <br>
    <input type="text" name="nama" value="<?= $d['nama'] ?>" required><br><br>

    Kelas <br>
    <input type="text" name="kelas" value="<?= $d['kelas'] ?>" required><br><br>

    Alamat <br>
    <textarea name="alamat" required><?= $d['alamat'] ?></textarea><br><br>

    Nilai <br>
    <input type="number" name="nilai" value="<?= $d['nilai'] ?>" min="0" max="100" required><br><br>

    <button type="submit" name="update">Update</button>
</form>

<?php
if (isset($_POST['update'])) {
    mysqli_query($koneksi, "UPDATE santri SET
        nama='$_POST[nama]',
        kelas='$_POST[kelas]',
        alamat='$_POST[alamat]',
        nilai='$_POST[nilai]'
        WHERE id='$id'
    ");
    header("location:index.php");
}
?>

</body>
</html>
