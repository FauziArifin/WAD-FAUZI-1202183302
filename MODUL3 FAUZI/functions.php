<?php
//koneksi ke database
$conn = mysqli_query('localhost', 'root', '', 'wad_modul3_fauzi');

if (!$conn) {
    echo "<script>alert('failed Connect into database')</script>";
}

function query($query)
{
    global $conn;
    //sebagai lemari
    $result = mysqli_query($conn, $query);

    //rows sebagai wadah kosong
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function buat_event($data)
{
    global $conn;
    $name = $data['nama'];
    $deskripsi = $data['deskripsi'];
    $kategori = $data['kategori'];
    $tanggal = $data['tanggal'];
    $mulai = $data['mulai'];
    $berakhir = $data['berakhir'];
    $tempat = $data['tempat'];
    $harga = $data['harga'];
    $benefit = implode(",", $data['add_benefit']);

    $rand = rand();
    $filename = $_FILES['gambar']['name'];

    $foto = $rand.'_'.$filename;
    move_uploaded_file($_FILES['gambar']['tmp_name'], 'img/'.$foto);

    $query = "";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}
function edit($data){
    global $conn;
    $id = $data['id'];
    $name = $data['nama'];
    $deskripsi = $data['deskripsi'];
    $kategori = $data['kategori'];
    $tanggal = $data['tanggal'];
    $mulai = $data['mulai'];
    $berakhir = $data['berakhir'];
    $tempat = $data['tempat'];
    $harga = $data['harga'];
    $benefit = implode(",", $data['add_benefit']);

    $rand = rand();
    $filename = $_FILES['gambar']['name'];

    if(!empty($filename)){
        $foto = $rand.'_'.$filename;
        move_uploaded_file($_FILES['gambar']['tmp_name'], 'img/'.$foto);
    }else{
        $foto = $data['gambar_default'];
    }
    

    $query = "UPDATE event_table SET 
                nama ='$name',
                deskripsi = '$deskripsi',
                gambar = '$foto',
                kategori = '$kategori',
                tanggal = '$tanggal',
                mulai = '$mulai',
                berakhir = '$berakhir',
                tempat = '$tempat',
                harga = '$harga',
                benefit = '$benefit'
                WHERE id=$id";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}
function delete($id){
    global $conn;
    mysqli_query($conn, "DELETE FROM event_table WHERE id = $id");

    return mysqli_affected_rows($conn);
}
?>
