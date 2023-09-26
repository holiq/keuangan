<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>pemprograman3.com</title>
</head>
<?php
include 'koneksi.php';

if (!empty($_POST['save'])) {
  $nama = $_POST['nama'];
  $password = $_POST['password'];
  $level = $_POST['level'];
  $status = $_POST['status'];


  $a = mysqli_query($koneksi, "insert into user (nama, password, level, status) VALUES ('$nama', '$password', '$level', '$status')");

  if ($a) {
    header("location:tampil_user.php");
  } else {
    echo mysqli_error($koneksi);
  }
}
?>
<body>
  <h2>Pemprogaraman 3 2023</h2>
  <h3>Tambah Data User</h3>
  <form method="post">
    <table>
      <tr>
        <td>Nama</td>
        <td><input type="text" name="nama" id="nama"></td>
      </tr>
      <tr>
        <td>Password</td>
        <td><input type="password" name="password" id="password"></td>
      </tr>
      <tr>
        <td>Level</td>
        <td>
          <select name="level" id="level">
            <option value="">--Pilih--</option>
            <option value="1">Admin</option>
            <option value="2">Staff</option>
            <option value="3">SPV</option>
            <option value="4">MGR</option>
          </select>
        </td>
      </tr>
      <tr>
        <td>Status</td>
        <td>
          <select name="status" id="status">
            <option value="">--Pilih--</option>
            <option value="1">Aktif</option>
            <option value="0">Tidak Aktif</option>
          </select>
        </td>
      </tr>
      <tr>
        <td></td>
        <td><input type="submit" value="SAVE" name="save"></td>
      </tr>
    </table>
  </form>
</body>
</html>