<?php 

include_once '../function.php';

$id = $_GET["id_sbs"];

if (delete_sbs($id) > 0) {
    echo "

        <script>
            alert('data berhasil dihapus');
            document.location.href = 'input_sbs.php';
        </script>";
    }else {
        echo "
        <script >
            alert('data gagal dihapus');
            document.location.href = 'input_sbs.php';
        </script>";
}

?>