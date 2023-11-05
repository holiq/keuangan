<?php
require './header.php';
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

<div class="d-flex justify-content-center">
  <div class="card">
    <div class="card-body">
      <h3 class="card-title">Tambah Data Barang</h3>
      <a href="./tampil_barang.php">Kembali</a>
      <form method="post">
        <div class="mb-3">
          <label for="nama" class="form-label">Nama Barang</label>
          <input type="text" class="form-control" name="nama" id="nama">
        </div>
        <div class="mb-3">
          <label for="kode" class="form-label">Kode Barang</label>
          <input type="text" class="form-control" name="kode" id="kode">
        </div>
        <div class="mb-3">
          <label for="qty" class="form-label">Kategori</label>
          <select name="kategori" id="kategori" class="form-control">
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
        </div>
        <div class="mb-3">
          <label for="qty" class="form-label">Jumlah Stock</label>
          <input type="number" class="form-control" name="qty" id="qty">
        </div>
        <div class="mb-3">
          <label for="harga" class="form-label">Harga Satuan</label>
          <input type="number" class="form-control" name="harga" id="harga">
        </div>
        <input type="submit" name="save" value="Submit" class="btn btn-primary">
      </form>
    </div>
  </div>
</div>
<?php
require './footer.php';
?>