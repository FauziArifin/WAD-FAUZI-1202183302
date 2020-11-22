<?php
session_start();

if (!isset($_SESSION['login'])) {
    header('Location: login.php');
    exit;
}
include("functions.php");

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
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <style>
        .container {
            margin: 20px auto;
            background-color: aliceblue;
        }

        .judul {
            text-align: center;
        }

        .line {
            border: 1px solid;
        }
    </style>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://cdn.lineicons.com/2.0/LineIcons.css" rel="stylesheet">
    <title>Profile</title>
</head>

<body style="background-color:aliceblue;">
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <nav class="navbar navbar-expand-lg <?= $navbar ?>">
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
    <?php if (isset($_POST['edit'])) : ?>
        <?php $password = $_POST['password']; ?>
        <?php $password2 = $_POST['password2']; ?>
        <?php if (password_verify($password, $row_user['password']) && password_verify($password2, $row_user['password']))  : ?>
            <?php edit($_POST) ?>
                <div class="alert alert-success" role="alert">
                    Profile berhasil diedit
                </div>
            <?php header("Refresh: 1; URL=profile.php"); ?>
        <?php else : ?>
            <div class="alert alert-warning" role="alert">
                Password salah
            </div>
        <?php endif; ?>
    <?php endif; ?>

    <div class='container'>
        <br>
        <h4 class='judul'>Profile</h4>
        <div class='container' style="width: 60%;">

            <form action='' , method="POST">
                <div class="form-group row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                        <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="<?= $row_user['email']; ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="nama" name="nama" value="<?= $row_user['nama']; ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="phone" class="col-sm-2 col-form-label">Nomor Handphone</label>
                    <div class="col-sm-10">
                        <input type="tel" class="form-control" name="phone" id="phone" value="<?= $row_user['no_hp']; ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="password" class="col-sm-2 col-form-label">Password</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control" id="password" name="password">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="password2" class="col-sm-2 col-form-label">Confirm Password</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control" id="password2" name="password2">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="warna_nav" class="col-sm-2 col-form-label">Warna Navbar</label>
                    <div class="col-sm-3">
                        <select class="form-control" name='warna_nav'>
                            <option value="navbar-light bg-light" <?= $navbar == 'navbar-light bg-light' ? 'selected="selected"' : ""; ?>>Light</option>
                            <option value="navbar-dark bg-dark" <?= $navbar == 'navbar-dark bg-dark' ? 'selected="selected"' : ""; ?>>Dark</option>
                        </select>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary btn-block" name='edit'>Save changes</button>
                <button type="reset" class="btn btn-danger btn-block">Cancel</button>
            </form>
        </div>
    </div>
    <footer class="page-footer container-fluid font-small">
        <div class="footer-copyright text-center py-3">©2020 Copyright: <a href="index.php">WAD Beauty</a></div>
    </footer>

</body>

</html>