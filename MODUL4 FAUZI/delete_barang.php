<?php 
include('functions.php');

// $id = $_GET['id'];

// if (delete_barang($id)){
//     $_SESSION['pesan_hapus'] = "Barang berhasil dihapus!";
//     header("Location: cart.php");
// }else{
//     $_SESSION['pesan_hapus'] = "Barang gagal dihapus!";
//     header("Location: cart.php");
// }


$id = $_GET['id'];
if (delete_barang($id)) {
    echo "
    <script>
    alert('barang berhasil dihapus');
    document.location.href = 'cart.php';
    </script>
    ";
}else {
    echo "
    <script>
    alert('barang gagal dihapus');
    document.location.href = 'cart.php';
    </script>
    ";
}
