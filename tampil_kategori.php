<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>pemprograman3.com</title>
</head>

<body>
    <h2>Pemprogaraman 3 2023</h2>
    <a href="./input_kategori.php">Tambah Kategori</a>
    <table border="1">
        <tr>
            <th>Nama</th>
            <th>Diskon</th>
            <th>Opsi</th>
        </tr>
        <?php
        include 'koneksi.php';

        $no = 1;
        $data = mysqli_query($koneksi, 'select * from kategori');

        while ($d = mysqli_fetch_array($data)) {
        ?>
            <tr>
                <td><?= $d['nama_kategori']; ?></td>
                <td><?= $d['diskon']; ?></td>
                <td>
                    <a href="./edit_user.php?id=<?= $d['id'] ?>">EDIT</a>
                    <a href="./hapus_user.php?id=<?= $d['id'] ?>">HAPUS</a>
                </td>
            </tr>
        <?php
        }
        ?>
    </table>
</body>

</html>