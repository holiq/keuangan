<?php
session_start();

$file = basename($_SERVER['PHP_SELF']);
$protect = [
    'index.php',
    'input_barang.php',
    'input_kategori.php',
    'input_level.php',
    'input_transaksi.php',
    'input_user.php',
    'tampil_barang.php',
    'tampil_kategori.php',
    'tampil_level.php',
    'tampil_transaksi.php',
    'tampil_user.php',
];

if (!isset($_SESSION['login_status'])) {
    if (in_array($file, $protect)) {
        header("location:login.php");
    }
} else {
    if ($file == 'login.php') {
        header("location:index.php");
    }

    $role = $_SESSION['login_status']['role'];

    if ($role == 'staf' && ($file != 'tampil_transaksi.php' && $file != 'input_transaksi.php')) {
        header("location:tampil_transaksi.php");
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/bootstrap/css/bootstrap.min.css">
    <script src="./assets/bootstrap/js/bootstrap.bundle.min.js"></script>
    <title>pemprograman3.com</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom mb-4">
        <div class="container-fluid">
            <a class="navbar-brand" href="./">Pemprograman 3</a>
            <?php
            if (isset($_SESSION['login_status'])) :
            ?>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav">
                        <?php if ($role != 'staf'): ?>
                        <li class="nav-item">
                            <a class="nav-link" href="./tampil_kategori.php">Kategori</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./tampil_barang.php">Barang</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./tampil_level.php">Level</a>
                        </li>
                        <?php if ($role == 'admin'): ?>
                        <li class="nav-item">
                            <a class="nav-link" href="./tampil_user.php">User</a>
                        </li>
                        <?php endif; ?>
                        <?php endif; ?>
                        <li class="nav-item">
                            <a class="nav-link" href="./tampil_transaksi.php">Transaksi</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <?= $_SESSION['login_status']['nama'] . '|' . $_SESSION['login_status']['role']; ?>
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <li><a class="dropdown-item" href="./logout.php">Logout</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            <?php
            endif;
            ?>
        </div>
    </nav>
    <main class="container my-5">