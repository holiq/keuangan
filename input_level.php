<?php
require './header.php';
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
<div class="d-flex justify-content-center">
  <div class="card">
    <div class="card-body">
      <h3 class="card-title">Tambah Data Level</h3>
      <a href="./tampil_level.php">Kembali</a>
      <form method="post">
        <div class="mb-3">
          <label for="jenis" class="form-label">Jenis Level</label>
          <input type="text" class="form-control" name="jenis" id="jenis">
        </div>
        <div class="mb-3">
          <label for="diskon" class="form-label">Diskon</label>
          <input type="number" class="form-control" name="diskon" id="diskon">
        </div>
        <input type="submit" name="save" value="Submit" class="btn btn-primary">
      </form>
    </div>
  </div>
</div>
<?php
require './footer.php';
?>