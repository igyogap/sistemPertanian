<?php 

include_once '../function.php';

$id = $_GET["id_palawija"];

if (delete_palawija($id) > 0) {
    echo "

        <script>
            alert('data berhasil dihapus');
            document.location.href = 'input_palawija.php';
        </script>";
    }else {
        echo "
        <script >
            alert('data gagal dihapus');
            document.location.href = 'input_palawija.php';
        </script>";
}

?>