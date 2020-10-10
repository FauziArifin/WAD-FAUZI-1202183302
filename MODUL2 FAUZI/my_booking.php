<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="css/my_styles.css">
    <title>Booking</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-primary">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-center" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-item nav-link active" href="home.php">Home</a>
                <a class="nav-item nav-link" href="booking.php">Booking <span class="sr-only">(current)</span></a>
            </div>
        </div>
    </nav>

    <?php
    $number = rand();
    $nama = $_POST['nama'];
    $check_in = $_POST['check_in'];
    $duration = $_POST['duration'];
    $check_out = $check_in . ' + ' . $duration . ' days';
    $room_type = $_POST['room_type'];
    $phone_number = $_POST['phone_number'];
    if (isset($_POST['add_service'])) {
        $add_service = $_POST['add_service'];
    } else {
        $add_service = '';
    }

    ?>
    <div class='container_table'>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Booking Number</th>
                    <th scope="col">Name</th>
                    <th scope="col">Check-in</th>
                    <th scope="col"> Check-out</th>
                    <th scope="col">Room Type</th>
                    <th scope="col">Phone Number</th>
                    <th scope="col"> Service</th>
                    <th scope="col">Total Price</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row"><?= $number ?></th>
                    <td><?= $nama ?></td>
                    <td><?= date('d/m/Y', strtotime($check_in)) ?></td>
                    <td><?= date('d/m/Y', strtotime($check_out)) ?></td>
                    <td><?= $room_type ?></td>
                    <td><?= $phone_number ?></td>
                    <td><?php
                        if (!empty($add_service)) {
                            echo '<ul>';
                            foreach ($add_service as $service) {
                                echo '<li>' . $service . '</li>';
                            }
                            echo '</ul>';
                        } else {
                            echo 'no service';
                        }
                        ?>
                    </td>
                    <td>
                        <?php
                        //cek tipe room apa 
                        if ($room_type == 'standard') {
                            $price = 100;
                        } else if ($room_type == 'superior') {
                            $price = 200;
                        } else {
                            $price = 300;
                        }
                        $price *= $duration; //price dikalikan berapa hari menginap

                        //cek penambahan harga service
                        if ($add_service == '') {
                            $price = $price;
                        } else if (count((array)$add_service) == 2) {
                            $price += 40;
                        } else {
                            $price += 20;
                        }
                        echo '$ ' . $price;
                        ?>
                    </td>

                </tr>
            </tbody>
        </table>
    </div>


</body>

</html>