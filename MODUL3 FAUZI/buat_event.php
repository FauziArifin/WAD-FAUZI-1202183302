<?php
include('functions.php');

if (isset($_POST['submit'])) {
    if (buat_event($_POST, $_FILES) > 0) {
        echo "
            <script>
            alert('data berhasil ditambahkan');
            document.location.href = 'home.php';
            </script>
            ";
    } else {
        echo "
            <script>
            alert('data gagal ditambahkan');
            document.location.href = 'buat_event.php';
            </script>
            ";
    }
}

?>


<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <title>Buat Event</title>
</head>

<body>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>


    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand color=white;" href="home.php">EAD EVENTS</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNavAltMarkup">
            <div class="navbar-nav ">
                <a class="nav-link" href="home.php">Home</a>
                <a class="btn btn-outline-success" href="#" role="button">Buat Event</a>
            </div>
        </div>

    </nav>
    <br>
    <div class='container'>
        <h4>Buat Event</h4>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <div style='background-color:#d9534f'>
                        <br>
                    </div>
                    <div>
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="nama" name='nama' placeholder="input nama event" required>
                        </div>
                        <div class="form-group">
                            <label for="deskripsi">Deskripsi</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" name='deskripsi' rows="3"></textarea>
                        </div>
                        <label for="gambar">Upload Gambar</label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="customFile" name='gambar' required>
                            <label class="custom-file-label" for="customFile">Choose file</label>
                        </div>
                        <script>
                            $('#customFile').on('change', function() {
                                //get the file name
                                var fileName = $(this).val();
                                //replace the "Choose a file" label
                                $(this).next('.custom-file-label').html(fileName);
                            })
                        </script>
                        <!-- <div class="custom-file">
                            <input type="file" class="custom-file-input" id="customFile">
                            <label class="custom-file-label" for="customFile">Choose file</label>
                        </div> -->
                        <br>
                        <div class="form-group">
                            <br>
                            <legend class="col-form-label col-sm-2 pt-0">Kategori</legend>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="online" name="kategori" value='online' class="custom-control-input">
                                <label class="custom-control-label" for="online">Online</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="offline" name="kategori" value='offline' class="custom-control-input">
                                <label class="custom-control-label" for="offline">Offline</label>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="form-group col-md-6">
                    <div style='background-color:#0275d8'>
                        <br>
                    </div>
                    <div>
                        <div class="form-group">
                            <label for="tanggal">Tanggal</label>
                            <input type="date" class="form-control" name='tanggal' id="tanggal" required>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="mulai">Jam Mulai</label>
                                <!-- <input type="time" class="form-control" name='mulai' id="mulai" required> -->
                                <select class='form-control' name='mulai'>
                                    <option value="18:00">18:00</option>
                                    <option value="19:00">19:00</option>
                                    <option value="20:00">20:00</option>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="berakhir">Jam Berakhir</label>
                                <!-- <input type="time" class="form-control" name='berakhir' id="berakhir" required> -->
                                <select class='form-control' name='berakhir'>
                                    <option value="20:00">20:00</option>
                                    <option value="21:00">21:00</option>
                                    <option value="22:00">22:00</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="tempat">Tempat</label>
                            <input type="text" class="form-control" name='tempat' id="tempat" required>
                        </div>
                        <div class="form-group">
                            <label for="tempat">Harga</label>
                            <input type="number" class="form-control" name="harga" id="harga" required>
                        </div>
                        <legend class="col-form-label col-sm-2 pt-0">Benefit</legend>
                        <div class="form-row">
                            <div class="form-group col-6 col-sm-2 ">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="snacks" name='add_benefit[]' value="snacks">
                                    <label class="custom-control-label" for="snacks">Snacks</label>
                                </div>
                            </div>
                            <div class="form-group col-6 col-sm-2">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="sertifikat" name='add_benefit[]' value="sertifikat">
                                    <label class="custom-control-label" for="sertifikat">Sertifikat</label>
                                </div>
                            </div>
                            <div class="form-group col-6 col-sm-2">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="souvenir" name='add_benefit[]' value="souvenir">
                                    <label class="custom-control-label" for="souvenir">Souvenir</label>
                                </div>
                            </div>
                        </div>
                        <div class='float-right'>
                            <button type="submit" class="btn btn-primary" name='submit'>Submit</button>
                            <button type="reset" class="btn btn-danger">Cancel</button>
                        </div>


                    </div>

                </div>
        </form>

    </div>
</body>

</html>