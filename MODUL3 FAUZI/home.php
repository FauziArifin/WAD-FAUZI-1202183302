<?php
include('');
$event = query('SELECT * FROM event_table');
$affected = mysqli_affected_rows($conn);



?>


<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <link href="https://cdn.lineicons.com/2.0/LineIcons.css" rel="stylesheet">
    <title>Home</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">EAD EVENTS</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNavAltMarkup">
            <div class="navbar-nav ">
                <a class="nav-link" href="home.php">Home</a>
                <a class="btn btn-outline-success" href="buat_event.php" role="button">Buat Event</a>
            </div>
        </div>
    </nav>
    <h3 style='text-align: center'>WELCOME TO EAD EVENTS!</h3>
    <br>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

    <br>

    <div class='container'>
        <?php
        if ($affected <= 0) {
            echo 'No event found';
        }
        ?>
        <div class='row'>
            <?php foreach ($event as $row) : ?>
                <div class='col-md-4 col-sm-6 mb-3'>
                    <div class="card" style="width: 18rem;">
                        <img src="img/<?= $row['gambar']; ?>" class="card-img-top">
                        <div class="card-body">
                            <h5 class="card-title"><?= $row['nama']; ?></h5>
                            <p class="card-text"><i class="lni lni-calendar"></i> <?= $row['tanggal']; ?></p>
                            <p class="card-text"><i class="lni lni-map-marker"></i> <?= $row['tempat']; ?></p>
                            <p class="card-text">Kategori: Event <?= $row['kategori']; ?></p>
                            <a href="detail_event.php?id=<?= $row['id']; ?>" class="btn btn-primary float-right">Detail</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>


    </div>



</body>

</html>