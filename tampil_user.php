<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>pemprograman3.com</title>
</head>

<body>
    <h2>Pemprogaraman 3 2023</h2>
    <a href="/">Kembali</a>
    <a href="./input_user.php">Tambah Data User</a>
    <table border="1">
        <tr>
            <th>Nama</th>
            <th>Password</th>
            <th>Role</th>
            <th>Status</th>
            <th>Level</th>
            <th>Opsi</th>
        </tr>
        <?php
        include 'koneksi.php';

        $no = 1;
        $data = mysqli_query($koneksi, 'select user.*, level.* from user join level on level.id_level=user.id_level');

        while ($d = mysqli_fetch_array($data)) {
        ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= $d['nama']; ?></td>
                <td><?= $d['level']; ?></td>
                <td><?= $d['status']; ?></td>
                <td><?= $d['jenis_level']; ?></td>
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