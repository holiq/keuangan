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
  $jenis = $_POST['jenis'];
  $diskon = $_POST['diskon'];

  $a = mysqli_query($koneksi, "insert into level (jenis_level, jumlah_diskon_level) VALUES ('$jenis', '$diskon')");

  if ($a) {
    header('location:tampil_level.php');
  } else {
    echo mysqli_error($koneksi);
  }
}
?>

<body>
  <h2>Pemprogaraman 3 2023</h2>
  <a href="./input_level.php">Kembali</a>
  <h3>Tambah Data Level</h3>
  <form method="post">
    <table>
      <tr>
        <td>Jenis</td>
        <td><input type="text" name="jenis" id="jenis"></td>
      </tr>
      <tr>
        <td>Diskon</td>
        <td><input type="number" name="diskon" id="diskon" value="0"></td>
      </tr>
      <tr>
        <td></td>
        <td><input type="submit" value="SAVE" name="save"></td>
      </tr>
    </table>
  </form>
</body>

</html>