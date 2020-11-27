<?php
session_();
include('functions.php');

if (!isset($_SESSION['login'])) {
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
    $user_id =  $_SESSION['user_id'];
}


$row_user = query("SELECT * FROM user WHERE id = $user_id")[0];
// $result_user = mysqli_query($conn, "SELECT * FROM user WHERE id = '$user_id'");
// $row_user = mysqli_fetch_assoc($result_user);

?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <style>
        .link_profile {
            text-decoration: underline;
            text-decoration-color: blue;
        }

        .card-img-top {
            width: 100%;
            height: 20vw;
            object-fit: cover;
        }

        .header_atas {
            background-color: crimson;
            text-align: center;
            color: white;
        }
    </style>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://cdn.lineicons.com/2.0/LineIcons.css" rel="stylesheet">
    <title>Index</title>
</head>

<body>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <nav class="navbar navbar-expand-lg <?= $navbar; ?>">
        <a class="navbar-brand" href="#">WAD Beauty</a>
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
    <?php if (isset($_POST['tambah'])) : ?>
        <?php if (tambah_barang($_POST) > 0) : ?>
            <div class="alert alert-success" role="alert">
                Barang berhasil ditambahkan
            </div>
        <?php else : ?>
            <div class="alert alert-warning" role="alert">
                Barang gagal ditambahkan
            </div>
        <?php endif; ?>
    <?php endif; ?>
    <div class='container' style="width:70%; margin: 50px auto;">
        <div class="header_atas">
            <h3>WAD Beauty</h3>
            <p>Tersedia Skin Care murah tapi bukan murahan</p>
        </div>
        <div class="card-group">
            <div class="card">
                <img src="img/citra.jpg" class="card-img-top" alt="Gambar Citra Body Lotion">
                <div class="card-body">
                    <h5 class="card-title">Citra Night Whitening</h5>
                    <p class="card-text">Citra Night Whitening Hand and Body Lotion merupakan krim malam yang mengandung minyak biji anggur yang mampu membantu peremajaan kulit. Produk ini juga mampu memberikan nutrisi pada kulit sehingga tampak lebih cerah.</p>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><b>Rp25.000</b></li>
                </ul>
                <div class="card-footer">
                    <form action="" method="POST">
                        <input type="hidden" name="user_id" value=>
                        <input type="hidden" name="nama_barang" value="Citra Night Whitening">
                        <input type="hidden" name="harga" value=25000>
                        <button type="submit" class="btn btn-primary btn-block" name='tambah'>Tambahkan ke keranjang</button>
                        <!-- <a href="detail_event.php?id=" class="btn btn-primary btn-block">Tambahkan ke keranjang</a> -->
                    </form>
                </div>
            </div>
            <div class="card">
                <img src="img/sabun.jpg" class="card-img-top" alt="Gambar Kojie San">
                <div class="card-body">
                    <h5 class="card-title">Kojie San Soap</h5>
                    <p class="card-text">Kojie San Skin Lightening Soap Kojic Acid adalah sabun dengan formula yang dapat memutihkan, minyak kelapa yang menutrisi, dengan harum jeruk yang segar. Kandungannya terbukti aman digunakan dan efektif untuk meratakan warna kulit.</p>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><b>Rp45.000</b></li>
                </ul>
                <div class="card-footer">
                    <form action="" method="POST">
                        <input type="hidden" name="nama_barang" value="Kojie San Soap">
                        <input type="hidden" name="harga" value=45000>
                        <button type="submit" class="btn btn-primary btn-block" name='tambah'>Tambahkan ke keranjang</button>
                        <!-- <a href="detail_event.php?id=" class="btn btn-primary btn-block">Tambahkan ke keranjang</a> -->
                    </form>
                </div>
            </div>
            <div class="card">
                <img src="img/tonerCC.jpg" class="card-img-top" alt="Gambar Clean & Clear Oil Control Toner">
                <div class="card-body">
                    <h5 class="card-title">Clean & Clear Toner</h5>
                    <p class="card-text">Clean & Clear Oil Control Toner adalah penyegar dengan kandungan Salicylic Acid yang bekerja hingga ke dalam pori-pori untuk membantu mengangkat minyak berlebih di wajah serta mencegah timbulnya jerawat dan komedo.</p>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><b>Rp20.000</b></li>
                </ul>
                <div class="card-footer">
                    <form action="" method="POST">
                        <input type="hidden" name="nama_barang" value="Clean & Clear Toner">
                        <input type="hidden" name="harga" value=20000>
                        <button type="submit" class="btn btn-primary btn-block" name='tambah'>Tambahkan ke keranjang</button>
                        <!-- <a href="detail_event.php?id=" class="btn btn-primary btn-block">Tambahkan ke keranjang</a> -->
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>