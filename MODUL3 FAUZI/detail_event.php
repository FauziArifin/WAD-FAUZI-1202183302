<?php
include('functions.php');
$id = $_GET['id'];

$row = query("SELECT * FROM event_table WHERE id = $id")[0];

if (isset($_POST['edit'])) {

    if (edit($_POST) > 0) {
        echo "
        <script>
        alert('data berhasil diedit');
        document.location.href = 'home.php';
        </script>
        ";
    } else {
        echo "
        <script>
        alert('data gagal diedit');
        document.location.href = 'home.php';
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
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <link href="https://cdn.lineicons.com/2.0/LineIcons.css" rel="stylesheet">
    <style>
        .card {
            max-width: 800px;
            margin: 20px auto;
            display: flex;
            padding: 20px;
        }
    </style>

    <title>Detail Event</title>
</head>

<body>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="home.php">EAD EVENTS</a>
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
    <br>
    <h4 style='text-align: center; color:blue;'>Detail Event!</h4>

    <div class="card">
        <div class="card-header">
            <img src="img/<?= $row['gambar']; ?>" class="card-img-top mx-auto d-block" alt="Logo EAD" style="width:300px;">
        </div>
        <div class="card-body">
            <p class="card-title" style="font-size: 25px;"><?= $row['nama']; ?></p>
            <h6 class="card-text"><b>Deskripsi</b></h6>
            <p class="card-text"><?= $row['deskripsi']; ?></p>
            <div class="row">
                <div class="col">
                    <h6 class="card-text"><b>Informasi Event</b></h6>
                    <p class="card-text"><i class="lni lni-calendar"></i> <?= $row['tanggal']; ?></p>
                    <p class="card-text"><i class="lni lni-map-marker"></i> <?= $row['tempat']; ?></p>
                    <p class="card-text"><i class="lni lni-timer"></i> <?= date('H:i', strtotime($row['mulai'])) ?> - <?= date('H:i', strtotime($row['berakhir'])) ?></p>

                    <p class="card-text"><b>Kategori&emsp;</b><?= $row['kategori']; ?> </p>

                    <h6 class="card-text"><b>HTM Rp. <?= $row['harga']; ?></b></h6>
                </div>
                <div class="col">
                    <h6 class="card-text"><b>Benefit</b></h6>
                    <ul>
                        <li>
                            <p class="card-text"><?= $row['benefit'] ?></p>
                        </li>
                    </ul>
                </div>
            </div>
            <br>
            <div class='text-center'>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editModal" style="width:8rem;">Edit</button>
                <a href="delete_event.php?id=<?php echo $row['id'] ?>" class="btn btn-danger" style="width:8rem;">Delete</a>
            </div>
        </div>
    </div>


    <!-- Modal -->


    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Content Event</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="" method="post" enctype="multipart/form-data">
                        <input type="hidden" name='id' value="<?= $row['id']; ?>">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <div style='background-color:#d9534f'>
                                    <br>
                                </div>
                                <div>
                                    <div class="form-group">
                                        <label for="name">Name</label>
                                        <input type="text" class="form-control" id="nama" name='nama' placeholder="input nama event" value="<?= $row['nama']; ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="deskripsi">Deskripsi</label>
                                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name='deskripsi' required><?= $row['deskripsi']; ?></textarea>
                                    </div>
                                    <label for="gambar">Upload Gambar</label>
                                    <div class="custom-file">
                                        <input type="hidden" name='gambar_default' value="<?= $row['gambar']; ?>">
                                        <input type="file" class="custom-file-input" id="customFile" name='gambar' value='<?= $row['gambar']; ?>'>
                                        <label class="custom-file-label" for="customFile"><?= $row['gambar']; ?></label>
                                        <script>
                                            $('#customFile').on('change', function() {
                                                //get the file name
                                                var fileName = $(this).val();
                                                //replace the "Choose a file" label
                                                $(this).next('.custom-file-label').html(fileName);
                                            })
                                        </script>
                                    </div>
                                    <br>
                                    <div class="form-group">
                                        <br>
                                        <legend class="col-form-label col-sm-2 pt-0">Kategori</legend>
                                        <?php if ($row['kategori'] == 'offline') : ?>
                                            <div class="custom-control custom-radio custom-control-inline">
                                                <input type="radio" id="online" name="kategori" value='online' class="custom-control-input">
                                                <label class="custom-control-label" for="online">Online</label>
                                            </div>
                                            <div class="custom-control custom-radio custom-control-inline">
                                                <input type="radio" id="offline" name="kategori" value='offline' class="custom-control-input" checked>
                                                <label class="custom-control-label" for="offline">Offline</label>
                                            </div>
                                        <?php else : ?>
                                            <div class="custom-control custom-radio custom-control-inline">
                                                <input type="radio" id="online" name="kategori" value='online' class="custom-control-input" checked>
                                                <label class="custom-control-label" for="online">Online</label>
                                            </div>
                                            <div class="custom-control custom-radio custom-control-inline">
                                                <input type="radio" id="offline" name="kategori" value='offline' class="custom-control-input">
                                                <label class="custom-control-label" for="offline">Offline</label>
                                            </div>
                                        <?php endif ?>

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
                                        <input type="date" class="form-control" name='tanggal' id="tanggal" value="<?= $row['tanggal']; ?>" required>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="mulai">Jam Mulai</label>
                                            <!-- <input type="time" class="form-control" name='mulai' id="mulai" required> -->
                                            <select class='form-control' name='mulai'>

                                                <option value="18:00" <?= $row['mulai'] == '18:00:00' ? 'selected="selected"' : ""; ?>>18:00</option>
                                                <option value="19:00" <?= $row['mulai'] == '19:00:00' ? 'selected="selected"' : ""; ?>>19:00</option>
                                                <option value="20:00" <?= $row['mulai'] == '20:00:00' ? 'selected="selected"' : ""; ?>>20:00</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="berakhir">Jam Berakhir</label>
                                            <!-- <input type="time" class="form-control" name='berakhir' id="berakhir" required> -->
                                            <select class='form-control' name='berakhir'>

                                                <option value="20:00" <?= $row['mulai'] == '20:00:00' ? 'selected="selected"' : ""; ?>>20:00</option>
                                                <option value="21:00" <?= $row['mulai'] == '21:00:00' ? 'selected="selected"' : ""; ?>>21:00</option>
                                                <option value="22:00" <?= $row['mulai'] == '22:00:00' ? 'selected="selected"' : ""; ?>>22:00</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="tempat">Tempat</label>
                                        <input type="text" class="form-control" name='tempat' id="tempat" value="<?= $row['tempat']; ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="tempat">Harga</label>
                                        <input type="number" class="form-control" name="harga" id="harga" value="<?= $row['harga']; ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <?php $benefit = explode(',', $row['benefit']) ?>
                                        <legend class="col-form-label col-sm-2 pt-0">Benefit</legend>
                                        <div class="form-row">
                                            <div class="form-group col-6 col-sm-3 ">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="snacks" name='add_benefit[]' value="snacks" <?= in_array('snacks', $benefit) ? 'checked' : '' ?>>
                                                    <label class="custom-control-label" for="snacks">Snacks</label>
                                                </div>
                                            </div>
                                            <div class="form-group col-6 col-sm-3">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="sertifikat" name='add_benefit[]' value="sertifikat" <?= in_array('sertifikat', $benefit) ? 'checked' : '' ?>>
                                                    <label class="custom-control-label" for="sertifikat">Sertifikat</label>
                                                </div>
                                            </div>
                                            <div class="form-group col-6 col-sm-3">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="souvenir" name='add_benefit[]' value="souvenir" <?= in_array('souvenir', $benefit) ? 'checked' : '' ?>>
                                                    <label class="custom-control-label" for="souvenir">Souvenir</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary" name='edit'>Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>



</body>

</html>