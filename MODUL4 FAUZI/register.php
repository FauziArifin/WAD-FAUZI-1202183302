<?php
include('functions.php');

?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <style>
        .container {
            background-color: ghostwhite;
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

    <title>Registrasi</title>
</head>

<body style="background-color:steelblue;">
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">WAD Beauty</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-item nav-link" href="login.php">Login </a>
                <a class="nav-item nav-link active" href="#">Register <span class="sr-only">(current)</span></a>
            </div>
        </div>
    </nav>
    <?php if (isset($_POST['daftar'])):?>
        <?php if (registrasi($_POST) > 0):?>>
            <div class="alert alert-success" role="alert">
                Registrasi Berhasil, Silakan Login
            </div>
            <?php header("Refresh: 2; URL=login.php");?>
        <?php else: ?>
            <?php echo mysqli_error($conn); ?>
        <?php endif; ?>
    <?php endif; ?>
    <br>
    <div class='container' style="width:40%">
        <h4 class='judul'>Registrasi</h4>
        <hr class='line'>
        <div class='container' style="width:80%">
            <form action="" method="post">
                <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="text" class="form-control" id="nama" name='nama' placeholder="Inputkan nama" required>
                </div>
                <div class="form-group">
                    <label for="email">Email address</label>
                    <input type="email" class="form-control" id="email" name='email' placeholder="name@mail.com" required>
                </div>
                <div class="form-group">
                    <label for="phone">Nomor Hp</label>
                    <input type="tel" class="form-control" id="phone" name='phone' required>
                </div>
                <div class="form-group">
                    <label for="password">Kata Sandi</label>
                    <input type="password" class="form-control" id="password" name='password' required>
                </div>
                <div class="form-group">
                    <label for="password2">Konfirmasi Kata Sandi</label>
                    <input type="password" class="form-control" id="password2" name='password2' required>
                </div>
                <div class='text-center'>
                    <button type="submit" class="btn btn-primary mb-2 " name='daftar'>Daftar</button>
                    <br>
                    <small>Sudah punya akun? <a href="login.php">Login</a></small>
                </div>

            </form>
        </div>
        <br>
    </div>
</body>

</html>