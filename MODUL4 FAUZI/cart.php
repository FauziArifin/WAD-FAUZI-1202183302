<?php
session_start();
include('functions.php');

if (!isset($['login'])) {
    header('Location: login.php');
    exit;
}
if (!empty($_COOKIE['warna_bar'])) {
    $navbar = $_COOKIE['warna_bar'];
} else {
    $navbar = 'navbar-light bg-light';
}

if (isset($_COOKIE['login'])) {
    if ($_COOKIE['login'] == 'true') {
        $user_id = $_COOKIE['user_id'];
    }
}else {
    $user_id =  $['user_id'];
}

$row_cart = query("SELECT * FROM cart WHERE user_id = $user_id");
$row_user = query("SELECT * FROM user WHERE id = $user_id")[0];

?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <style>
        .container {
            width: 60%;
            margin: 80px auto;
        }
    </style>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://cdn.lineicons.com/2.0/LineIcons.css" rel="stylesheet">
    <title>Cart</title>
</head>

<body>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <nav class="navbar navbar-expand-lg <?= $navbar; ?>">
        <a class="navbar-brand" href="index.php">WAD Beauty</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-item nav-link active" href="cart.php"><i class="lni lni-cart"></i> <span class="sr-only">(current)</span></a>
                <a class="nav-item nav-link active" href="#">Selamat Datang <span class="sr-only">(current)</span></a>
                <div class="nav-item dropdown">
                    <a class="link_profile nav-link dropdown-toggle" style='color:blue;' href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <?= $row_user['nama']; ?>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right text-right" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="profile.php">Profile</a>
                        <a class="dropdown-item" href="logout.php">Logout</a>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    <div class='container'>
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama Barang</th>
                    <th scope="col">Harga</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                <?php $total = 0; ?>
                <?php foreach ($row_cart as $row) : ?>
                    <tr>
                        <td><?= $i; ?></td>
                        <td><?= $row['nama_barang']; ?></td>
                        <td><?= "Rp" . number_format($row['harga'], 0, ".", "."); ?></td>
                        <td>
                            <a href="delete_barang.php?id=<?= $row['id'] ?>" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                    <?php $i++; ?>
                    <?php $total += $row['harga']; ?>
                <?php endforeach; ?>
                <tr>
                    <th scope="row" colspan="2">Total</th>
                    <th scope="row" colspan="2"><?= "Rp" . number_format($total, 0, ".", "."); ?></th>
                </tr>
            </tbody>
        </table>
    </div>

    <footer class="page-footer container-fluid font-small">
        <div class="footer-copyright text-center py-3">©2020 Copyright: <a href="index.php">WAD Beauty</a></div>
    </footer>
</body>

</html>