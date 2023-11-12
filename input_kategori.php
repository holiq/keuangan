<?php
require './header.php';
include './koneksi.php';
include './validation.php';

if (!empty($_POST['save'])) {
    $nama_kategori = $_POST['nama'];
    $diskon_kategori = $_POST['diskon'];

    $errors = validate(compact('nama_kategori'));

    if (empty($errors)) {
        $a = mysqli_query($koneksi, "insert into kategori (nama_kategori, diskon_kategori) VALUES ('$nama_kategori', '$diskon_kategori')");

        if ($a) {
            header('location:tampil_kategori.php');
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
                <h2 class="text-center">Tambah Data Kategori</h2>
                <?= response($errors) ?>
                <form method="post">
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama Kategori</label>
                        <input type="text" class="form-control" name="nama" id="nama">
                    </div>
                    <div class="mb-3">
                        <label for="diskon" class="form-label">Diskon Kategori</label>
                        <input type="text" class="form-control" name="diskon" id="diskon" value="0">
                    </div>
                    <div class="d-flex justify-content-end gap-4">
                        <input type="submit" name="save" value="Submit" class="btn btn-primary">
                        <a class="btn btn-danger" href="./tampil_kategori.php">Kembali</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php
require './footer.php';
?>