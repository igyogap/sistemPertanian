<?php 

include_once '../function.php';

$id = $_GET["id_padi"];

if (delete_padi($id) > 0) {
    echo "

        <script>
            alert('data berhasil dihapus');
            document.location.href = 'input_padi.php';
        </script>";
    }else {
        echo "
        <script >
            alert('data gagal dihapus');
            document.location.href = 'input_padi.php';
        </script>";
}

?>