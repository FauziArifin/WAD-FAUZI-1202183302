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
                <a class="nav-item nav-link active" href="home.php">Home </a>
                <a class="nav-item nav-link" href="booking.php">Booking <span class="sr-only">(current)</span></a>
            </div>
        </div>
    </nav>

    <div class='container2'>
        <div class='box_form'>
            <form action='my_booking.php' method='POST'>
                <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="text" name="nama" class="form-control">
                </div>

                <div class="form-group">
                    <label for="date">Check-in</label>
                    <input type="date" name="check_in" class="form-control">
                </div>

                <div class="form-group">
                    <label for="duration">Duration</label>
                    <input type="number" name="duration" class="form-control">
                    <p><small>Day(s)</small></p>
                </div>

                <div class="form-group">
                    <label for="room_type">Room Type</label>
                    <?php if (isset($_POST['menu'])) : ?>
                        <?php $menu = $_POST['menu']; ?>
                    <?php endif; ?>
                    <?php if (!empty($menu)) : ?>
                        <?php echo '<input type="text" class="form-control" name="room_type" readonly value='.$menu.'>'?>;
                    <?php else : ?>
                        <select class='form-control' name='room_type'>
                            <option value="standard" selected>Standard</option>
                            <option value="superior">Superior</option>
                            <option value="luxury">Luxury</option>
                        </select>
                    <?php endif; ?>
                </div>

                <div class='form-group'>
                    <label for="add_service">Add Service(s)</label>
                    <p><small>$ 20/service</small></p>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="add_service[]" value="room service">
                        <label class="form-check-label">
                            Room Services
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="add_service[]" value="breakfast">
                        <label class="form-check-label">
                            Breakfast
                        </label>
                    </div>
                </div>
                <div class="form-group">
                    <label for="phoneNumber">Phone Number</label>
                    <input type="number" name="phone_number" class="form-control">
                </div>
                <button type="reset" value='Kirim' class="btn btn-primary btn-block">Submit</button>
            </form>
        </div>
        <div class='box_image'>
            <?php if (empty($menu)) : ?>
                <img class='image_booking' src="images/standard.jpg" alt="Standard Room">
            <?php else : ?>
                <?php if ($menu == 'standard') : ?>
                    <img class='image_booking' src="images/standard.jpg" alt="">
                <?php elseif ($menu == 'superior') : ?>
                    <img class='image_booking' src="images/superior.jpg" alt="">
                <?php else : ?>
                    <img class='image_booking' src="images/luxury.jpg" alt="">
                <?php endif; ?>
            <?php endif; ?>
            <!-- <img class='image_booking' src="images/standard.jpg" alt="Standard Room"> -->

        </div>
    </div>




</body>

</html>