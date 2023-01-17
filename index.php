<?php
include("koneksi.php");

$q = "";
if (isset($_GET['submit']) && !empty($_GET['q'])) {
    $q = $_GET['q'];
    $sql_where = "WHERE nik LIKE '%".$q."%' or nama LIKE '%".$q."%' or jenis_kelamin LIKE '%".$q."%' or no_hp LIKE '%".$q."%' or alamat LIKE '%".$q."%' or no_rumah LIKE '%".$q."%' or status LIKE '%".$q."%' or users_id LIKE '%" ;


}
$title = 'Iuran KAS RT';
$sql = 'SELECT * FROM warga ';
if (isset($sql_where))
    $sql .= $sql_where;
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Taopik Sodikin UAS</title>
    <link href="style.css" rel="stylesheet" type="text/css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

</head>
<body style="margin-top: 30px; background-color: #000000;">
    <div class="container" style="background-color: #556B2F; width: 250%; padding: 10px;">
        <br><br>
        <div class="head">
        <h1 style="color: #7eeef3;">Iuran KAS RT</h1>
        <h2 style="color: #blue;">Data Warga</h2>
        </div>
        <div class="main">
            <table class="table table-striped table-hover">
            <tr>
                <th style="color: #7eeef3;">Nik</th>
                <th style="color: #7eeef3; width: 5%;">Nama</th>
                <th style="color: #7eeef3;">Jenis_kelamin</th>
                <th style="color: #7eeef3;">No_hp</th>
                <th style="color: #7eeef3;">Alamat</th>
                <th style="color: #7eeef3;">No_rumah</th>
                <th style="color: #7eeef3;">Status</th>
                <th style="color: #7eeef3; width: 5%;">ID</th>
                <th style="color: #7eeef3;">Aksi</th>
            </tr>
            <?php if($result): ?>
            <?php while($row = mysqli_fetch_array($result)): ?>
            <tr>
                <td style="color: #7eeef3;"><?= $row['nik'];?></td>
                <td style="color: #7eeef3;"><?= $row['nama'];?></td>
                <td style="color: #7eeef3;"><?= $row['jenis_kelamin'];?></td>
                <td style="color: #7eeef3;"><?= $row['no_hp'];?></td>
                <td style="color: #7eeef3;"><?= $row['alamat'];?></td>
                <td style="color: #7eeef3;"><?= $row['no_rumah'];?></td>
                <td style="color: #7eeef3;"><?= $row['status'];?></td>
                <td style="color: #7eeef3;"><?= $row['users_id'];?></td>
                <td style="color: #7eeef3;"><?= $row['id'];?></td>
                <td style="color: #7eeef3;">
                    <button class="btn" type="button" style="background-color: #09bcf3; width: 45%;"><a style="color: #FFFFFF;" href="ubah.php?id=<?= $row['id'];?>">Ubah Data</a></button> 
                    <button class="btn" type="button" style="background-color: #e4492e; width: 50%;"><a style="color: #FFFFFF;" href="hapus.php?id=<?= $row['id'];?>">Hapus Data</a></button>
                </td>
            </tr>
            <?php endwhile; else: ?>
            <tr>
                <td style="color: #7eeef3;" colspan="7">Belum ada data</td>
            </tr>
            <?php endif; ?>
            </table>
        </div><br><br><br>
        <div>
        <button class="btn" type="button" style="background-color: #07940e;"><a style="color: #7eeef3" href="tambah.php">Tambah Data</a></button>
        </div> <br>
        <div>
        <button class="btn" type="button" style="background-color: #07940e;"><a style="color: #FFFFFF" href="home.php">Kembali</a></button>
        </div>
    </div>
</body>
</html>