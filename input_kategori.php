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

<div class="row justify-content-center mt-5">
    <div class="col-lg-6 col-md-8 col-sm-10 col-12">
        <div class="card">
            <div class="card-body">
                <h2 class="text-center">Tambah Data Kategori</h2>
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
</div>
<?php
require './footer.php';
?>