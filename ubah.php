<?php
error_reporting(E_ALL);
include_once 'koneksi.php';

if (isset($_POST['submit'])) 
{
    $id = $_POST['id'];
    $nik = $_POST['nik'];
    $nama = $_POST['nama'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $no_hp = $_POST['no_hp'];
    $alamat = $_POST['alamat'];
    $no_rumah = $_POST['no_rumah'];
    $status = $_POST['status'];
    $users_id = $_POST['users_id'];

    $sql = "UPDATE warga SET nik = '$nik', nama = '$nama', jenis_kelamin = '$jenis_kelamin', 
    no_hp= '$no_hp', alamat = '$alamat', no_rumah = '$no_rumah', status = '$status',  users_id = '$users_id' ";
    $sql .= "WHERE id = '{$id}'";
    $result = mysqli_query($conn, $sql);

    header('location: index.php');
    }

    $id = $_GET['id'];
    $sql = "SELECT * FROM warga WHERE id = '{$id}'";
    $result = mysqli_query($conn, $sql);
    if (!$result) die('Error: Data tidak tersedia');
    $data = mysqli_fetch_array($result); 

    function is_select($var, $val) {
        if ($var == $val) return 'selected="selected"';
        return false;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Ubah Data</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

</head>
<body style="margin-top: 30px; background-color: #8B008B;">
    <div class="container" style="background-color: #000000; width: 50%; padding: 30px;">
        <h1 style="color: #FFFFFF; text-align: center;">Ubah Data</h1>
        <div class="main">
            <form method="post" action="ubah.php" enctype="multipart/form-data">
                <div class="input-group">
                    <span class="input-group-text">Nik</span>
                    <input class="form-control" type="int" name="nik"  value = "<?php echo $data['nik'];?>"/>
                </div><br>
                <div class="input-group">
                    <span class="input-group-text">Nama</span>
                    <input class="form-control" type="text" name="nama" value="<?php echo $data['nama'];?>"/>
                </div><br>
                <div class="input-group">
                    <span class="input-group-text">Jenis_kelamin</span>
                    <input class="form-control" type="text" name="jenis_kelamin" value="<?php echo $data['jenis_kelamin'];?>"/>
                </div><br>
                <div class="input-group">
                    <span class="input-group-text">No_hp</span>
                    <input class="form-control" type="text" name="no_hp" value="<?php echo $data['no_hp'];?>"/>
                    
                </div>
                <div class="input-group">
                    <span class="input-group-text">Alamat</span>
                    <input class="form-control" type="text" name="alamat"  value = "<?php echo $data['alamat'];?>"/>
                </div>
                <div class="input-group">
                    <span class="input-group-text">No_rumah</span>
                    <input class="form-control" type="text" name="no_rumah"  value = "<?php echo $data['no_rumah'];?>"/>
                </div>
                <div class="input-group">
                    <span class="input-group-text">Status</span>
                    <input class="form-control" type="text" name="status"  value = "<?php echo $data['status'];?>"/>
                </div>
                <div class="input-group">
                <span class="input-group-text">Users_id</span>
                    <input class="form-control" type="text" name="users-id"  value = "<?php echo $data['users_id'];?>"/>
                </div>
                <div>
                <input type="hidden" name="id" value="<?php echo $data['id'];?>">
                <input class="tombol" type="submit" name="submit" value="Simpan"/>
                </div>
            </form>
        </div>
    </div>
</body>
</html>