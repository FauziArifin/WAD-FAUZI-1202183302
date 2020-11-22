<?php
//koneksi ke database
$conn = mysqli_connect('localhost', 'root', '', 'wad_modul4');

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

function registrasi($data)
{
    global $conn;
    $nama = $data['nama'];
    $email = $data['email'];
    $phone = $data['phone'];
    $password = $data['password'];
    $password2 = $data['password2'];

    //cek email udah ada atau belum
    $cek_email = mysqli_query($conn, "SELECT email FROM user
                        WHERE email='$email'");
    
    if (mysqli_fetch_assoc($cek_email)){
        echo "<div class='alert alert-danger' role='alert'>
                Email sudah terdaftar Sebelumnya
            </div>";
        return false;
    }

    //cek password apakah sama dengan konfirm
    if ($password !== $password2) {
        echo "<div class='alert alert-danger' role='alert'>
                Konfirmasi Password Salah
            </div>";
        return false;
    }
    //enkripsi password
    $password = password_hash($password, PASSWORD_DEFAULT);

    //query
    $query = "INSERT INTO user
                VALUES
                ('', '$nama', '$email', '$phone', '$password')";
    
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);

}

function tambah_barang($data){
    global $conn;
    if (isset($_COOKIE['login'])) {
        if ($_COOKIE['login'] == 'true') {
            $user_id = $_COOKIE['user_id'];
        }
    }else {
        $user_id =  $_SESSION['user_id'];
    }
    $nama_barang = $data['nama_barang'];
    $harga = $data['harga'];

    $query = "INSERT INTO cart
                VALUES
                ('', '$user_id', '$nama_barang', '$harga')";
    
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}
function delete_barang($id){
    global $conn;
    mysqli_query($conn, "DELETE FROM cart WHERE id = '$id'");

    return mysqli_affected_rows($conn);
}
function edit($data){
    global $conn;
    if (isset($_COOKIE['login'])) {
        if ($_COOKIE['login'] == 'true') {
            $id = $_COOKIE['user_id'];
        }
    }else {
        $id =  $_SESSION['user_id'];
    }
    $nama = $data['nama'];
    $no_hp = $data['phone'];
    $warna_bar = $data['warna_nav'];
    setcookie("warna_bar", "$warna_bar", time()+60*10);
    
    $query = "UPDATE user SET
                nama = '$nama',
                no_hp = '$no_hp'
                WHERE id = $id";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}
