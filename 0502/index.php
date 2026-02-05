<?php include 'koneksi.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Data Santri</title>
    <style>
        table { border-collapse: collapse; width: 70%; }
        th, td { border: 1px solid #000; padding: 8px; text-align: center; }
    </style>
</head>
<body>

<h2>Data Santri</h2>
<a href="tambah.php">+ Tambah Data</a>
<br><br>

<table>
<tr>
    <th>No</th>
    <th>Nama</th>
    <th>Kelas</th>
    <th>Alamat</th>
    <th>Nilai</th>
    <th>Status</th>
    <th>Aksi</th>
</tr>

<?php
$no = 1;
$data = mysqli_query($koneksi, "SELECT * FROM santri");
while ($d = mysqli_fetch_array($data)) {

    // status kelulusan
    if ($d['nilai'] < 75) {
        $status = "<span style='color:red'>Remedial</span>";
    } else {
        $status = "<span style='color:green'>Lulus</span>";
    }
?>
<tr>
    <td><?= $no++ ?></td>
    <td><?= $d['nama'] ?></td>
    <td><?= $d['kelas'] ?></td>
    <td><?= $d['alamat'] ?></td>
    <td><?= $d['nilai'] ?></td>
    <td><?= $status ?></td>
    <td>
        <a href="edit.php?id=<?= $d['id'] ?>">Edit</a> |
        <a href="hapus.php?id=<?= $d['id'] ?>" onclick="return confirm('Hapus data?')">Hapus</a>
    </td>
</tr>
<?php } ?>
</table>

</body>
</html>
