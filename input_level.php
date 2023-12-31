<?php
require './header.php';
include './koneksi.php';
include './validation.php';

if (!empty($_POST['save'])) {
    $jenis_level = $_POST['jenis'];
    $diskon_level = $_POST['diskon'];

    $errors = validate(compact('jenis_level', 'diskon_level'));

    if (empty($errors)) {
        $a = mysqli_query($koneksi, "insert into level (jenis_level, diskon_level) VALUES ('$jenis_level', '$diskon_level')");

        if ($a) {
            header('location:tampil_level.php');
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
                <h2 class="text-center">Tambah Data Level</h2>
                <?= response($errors) ?>
                <form method="post">
                    <div class="mb-3">
                        <label for="jenis" class="form-label">Jenis Level</label>
                        <input type="text" class="form-control" name="jenis" id="jenis">
                    </div>
                    <div class="mb-3">
                        <label for="diskon" class="form-label">Diskon Level</label>
                        <input type="number" class="form-control" name="diskon" id="diskon">
                    </div>
                    <div class="d-flex justify-content-end gap-4">
                        <input type="submit" name="save" value="Submit" class="btn btn-primary">
                        <a class="btn btn-danger" href="./tampil_level.php">Kembali</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php
require './footer.php';
?>