<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="css/my_styles.css">
    <title>Home</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-primary">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-center" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-item nav-link active" href="home.php">Home <span class="sr-only">(current)</span></a>
                <a class="nav-item nav-link" href="booking.php">Booking</a>
            </div>
        </div>
    </nav>

    <h4 style='text-align: center; color: #0275d8'>EAD HOTEL</h4>
    <H5 style='text-align: center; color: #0275d8'>Welcome To 5 Star Hotel</H5>

    <div class='container text-center'>
        <div class='row'>
            <div class='col-md-4 col-sm-6 mb-3'>
                <div class="card " style="width: 18rem;">
                    <img class="card-img-top" src="images/standard.jpg" alt="Standard Room">
                    <div class="card-body">
                        <h5 class="card-title">Standard</h5>
                        <h5 class='card-price'>$ 90/Day</h5>
                    </div>
                    <div class="card-header">Facilities</div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">1 Single Bed</li>
                        <li class="list-group-item">1 Bedroom</li>
                    </ul>
                    <div class="card-footer">
                        <form action="booking.php" method="POST">
                            <button type="submit" value='standard' class="btn btn-primary" name='menu'>Book now</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class='col-md-4 col-sm-6 mb-3'>
                <div class="card" style="width: 18rem;">
                    <img class="card-img-top" src="images/superior.jpg" alt="Superior Room">
                    <div class="card-body">
                        <h5 class="card-title">Superior</h5>
                        <h5 class='card-price'>$ 150/Day</h5>
                    </div>
                    <div class="card-header">Facilities</div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">1 Double Bed</li>
                        <li class="list-group-item">1 Televison and Wi-fi</li>
                        <li class="list-group-item">1 Bathroom with hot water</li>
                    </ul>
                    <div class="card-footer">
                        <form action="booking.php" method="POST">
                            <button type="submit" value='superior' class="btn btn-primary" name='menu'>Book now</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class='col-md-4 col-sm-6 mb-3'>
                <div class="card" style="width: 18rem;">
                    <img class="card-img-top" src="images/luxury.jpg" alt="Luxury Room">
                    <div class="card-body">
                        <h5 class="card-title text-center">Luxury</h5>
                        <h5 class='card-price text-center'>$ 200/Day</h5>
                    </div>
                    <div class="card-header">Facilities</div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">2 Doble Bed</li>
                        <li class="list-group-item">2 Bathroom with hot water</li>
                        <li class="list-group-item">1 Kitchen</li>
                        <li class="list-group-item">1 Television and Wi-Fi</li>
                        <li class="list-group-item">1 Workroom</li>
                    </ul>
                    <div class="card-footer">
                        <form action="booking.php" method="POST">
                            <button type="submit" value='luxury' class="btn btn-primary" name='menu'>Book now</button>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>


</body>

</html>