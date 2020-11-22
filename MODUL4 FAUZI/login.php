<?php
session_start();
include('functions.php');


if (isset($_COOKIE['login'])) {
    if ($_COOKIE['login'] == 'true') {
        $_SESSION['login'] = true;
    }
}

if (isset($_SESSION['login'])) {
    header('Location: index.php');
    exit;
}



// if (isset($_POST['login'])) {

//     $email = $_POST['email'];
//     $password = $_POST['password'];

//     $result = mysqli_query($conn, "SELECT * FROM user 
//                                     WHERE email = '$email'");

//     if (mysqli_num_rows($result) == 1) {
//         $row = mysqli_fetch_assoc($result);

//         //cek password
//         if (password_verify($password, $row['password'])) {
//             //set session
//             $_SESSION['login'] = true;
//             $_SESSION['user_id'] = $row['id'];

//             //cek remember me
//             if (isset($_POST['remember'])){
//                 //buat cookie
//                 setcookie('login', 'true', time()+60*60);
//             }
//             setcookie('warna_bar', 'navbar-light bg-light', time()+60*60);

//             header("Refresh: 2; URL=index.php");
//             exit;
//         }
//     }
//     $error = true;
// }

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

    <title>Login</title>
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
                <a class="nav-item nav-link active" href="#">Login <span class="sr-only">(current)</span></a>
                <a class="nav-item nav-link" href="register.php">Register</a>
            </div>
        </div>
    </nav>
    <?php
    if (isset($_POST['login'])) {

        $email = $_POST['email'];
        $password = $_POST['password'];

        $result = mysqli_query($conn, "SELECT * FROM user 
                                        WHERE email = '$email'");

        if (mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_assoc($result);

            //cek password
            if (password_verify($password, $row['password'])) {
                //set session
                $_SESSION['login'] = true;
                $_SESSION['user_id'] = $row['id'];
                //cek remember me
                if (isset($_POST['remember'])) {
                    //buat cookie
                    $row_id = $row['id'];
                    setcookie('login', 'true', time() + 60 * 60);
                    setcookie("user_id", "$row_id", time() + 60 * 60);
                }
                echo "<div class='alert alert-success' role='alert'>
                        Login berhasil
                    </div>";
                header("Refresh: 2; URL=index.php");
                exit;
            }
        }
        $error = true;
    }

    ?>


    <?php if (isset($error)) : ?>
        <div class="alert alert-danger" role="alert">
            Email atau Password salah!!
        </div>
    <?php endif; ?>

    <div class='container' style="width:40%; margin: 80px auto;">
        <br>
        <h4 class='judul'>Login</h4>
        <hr class='line'>
        <div class='container' style="width:80%">
            <form action="" method="post">
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name='email' placeholder="name@mail.com" required>
                </div>
                <div class="form-group">
                    <label for="password">Kata Sandi</label>
                    <input type="password" class="form-control" id="password" name='password' placeholder="password" required>
                </div>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="remember" name='remember'>
                    <label class="form-check-label" for="remember">Remember me</label>
                </div>
                <div class='text-center'>
                    <button type="submit" class="btn btn-primary mb-2 " name='login'>Login</button>

                    <br>
                    <small>Belum punya akun? <a href="register.php">Registrasi</a></small>
                </div>

            </form>
        </div>
        <br>
    </div>
</body>

</html>