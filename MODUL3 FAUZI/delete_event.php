<?php 
include 'functions.php';

$id = $_GET['id'];
if (delete($id) > 0) {
    echo "
    <script>
    alert('data berhasil dihapus');
    document.location.href = 'home.php';
    </script>
    ";
} else {
    echo "
    <script>
    alert('data gagal dihapus');
    document.location.href = 'home.php';
    </script>
    ";
}


?>