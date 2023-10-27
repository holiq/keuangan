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
  $kode = $_POST['kode'];
  $qty = $_POST['qty'];
  $harga = $_POST['harga'];
  $kategori = $_POST['kategori'];

  $a = mysqli_query($koneksi, "insert into barang (nama_barang, kode_barang, qty, harga, kategori_id) VALUES ('$nama', '$kode', '$qty', '$harga', '$kategori')");

  if ($a) {
    header('location:tampil_barang.php');
  } else {
    echo mysqli_error($koneksi);
  }
}
?>

<body>
  <h2>Pemprogaraman 3 2023</h2>
  <a href="./input_barang.php">Kembali</a>
  <h3>Tambah Data Barang</h3>
  <form method="post">
    <table>
      <tr>
        <td>Nama Barang</td>
        <td><input type="text" name="nama" id="nama"></td>
      </tr>
      <tr>
        <td>Kode Barang</td>
        <td><input type="text" name="kode" id="kode"></td>
      </tr>
      <tr>
        <td>Quantity</td>
        <td><input type="number" name="qty" id="qty"></td>
      </tr>
      <tr>
        <td>Harga</td>
        <td><input type="number" name="harga" id="harga"></td>
      </tr>
      <tr>
        <td>Kategori</td>
        <td>
          <select name="kategori" id="kategori">
            <option value="">--Pilih--</option>
            <?php
            $data = mysqli_query($koneksi, 'select * from kategori');

            while ($d = mysqli_fetch_array($data)) {
            ?>
              <option value="<?= $d['id_kategori']; ?>"><?= $d['nama_kategori']; ?></option>
            <?php
            }
            ?>
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