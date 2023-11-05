<?php
require './header.php';
include 'koneksi.php';

if (!empty($_POST['save'])) {
  $nama = $_POST['nama'];
  $diskon = $_POST['diskon'];

  $a = mysqli_query($koneksi, "insert into kategori (nama_kategori, diskon_kategori) VALUES ('$nama', '$diskon')");

  if ($a) {
    header('location:tampil_kategori.php');
  } else {
    echo mysqli_error($koneksi);
  }
}
?>
<div class="d-flex justify-content-center">
  <div class="card">
    <div class="card-body">
      <h3 class="card-title">Tambah Data Kategori</h3>
      <a href="./tampil_kategori.php">Kembali</a>
      <form method="post">
        <div class="mb-3">
          <label for="nama" class="form-label">Nama Kategori</label>
          <input type="text" class="form-control" name="nama" id="nama">
        </div>
        <div class="mb-3">
          <label for="diskon" class="form-label">Diskon Kategori</label>
          <input type="text" class="form-control" name="diskon" id="diskon" value="0">
        </div>
        <input type="submit" name="save" value="Submit" class="btn btn-primary">
      </form>
    </div>
  </div>
</div>
<?php
require './footer.php';
?>