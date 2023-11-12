<?php
require './header.php';
include './koneksi.php';
include './validation.php';

if (!empty($_POST['save'])) {
    $nama_barang = $_POST['nama'];
    $kode_barang = $_POST['kode'];
    $jumlah_stok = $_POST['qty'];
    $harga_satuan = $_POST['harga'];
    $kategori = $_POST['kategori'];

    $errors = validate(compact('nama_barang', 'kode_barang', 'kategori', 'jumlah_stok', 'harga_satuan'));

    if (empty($errors)) {
        $a = mysqli_query($koneksi, "INSERT INTO barang (nama_barang, kode_barang, qty, harga, kategori_id) VALUES ('$nama_barang', '$kode_barang', '$jumlah_stok', '$harga_satuan', '$kategori')");

        if ($a) {
            header('location:tampil_barang.php');
        } else {
            echo mysqli_error($koneksi);
        }
    }
}
?>

<div class="row justify-content-center mt-5">
    <div class="col-lg-6 col-md-8 col-sm-10 col-12">
        <div class="card">
            <div class="card-body">
                <h2 class="text-center">Tambah Data Barang</h2>
                <?= response($errors) ?>
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
                            $data = mysqli_query($koneksi, 'SELECT * FROM kategori');

                            while ($d = mysqli_fetch_array($data)) {
                            ?>
                                <option value="<?= $d['id_kategori']; ?>"><?= $d['nama_kategori']; ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="qty" class="form-label">Jumlah Stok</label>
                        <input type="number" class="form-control" name="qty" id="qty">
                    </div>
                    <div class="mb-3">
                        <label for="harga" class="form-label">Harga Satuan</label>
                        <input type="number" class="form-control" name="harga" id="harga">
                    </div>
                    <div class="d-flex justify-content-end gap-4">
                        <input type="submit" name="save" value="Submit" class="btn btn-primary">
                        <a class="btn btn-danger" href="./tampil_barang.php">Kembali</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php
require './footer.php';
?>