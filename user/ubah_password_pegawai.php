<?php 
session_start();
// koneksi ke databse
require '../function.php';

if(!isset($_SESSION['pegawai'])){
		header("location:../index.php?pesan=level");
    }



//ambil data di URL
$id = $_GET["id"];

// query data user

$usr = query("SELECT * FROM tb_login WHERE id = $id")[0];

// update
if (isset($_POST['update'])) {

    $oldPassword = $_POST['old_password'];
    $newPassword = $_POST['new_password'];
    $repeatNewPassword = $_POST['repeat_new_password'];
    

    if (!password_verify($oldPassword, $usr['password'])) {
        echo '
            <script>
                alert("Password lama yang anda masukkan salah!");
                window.location.href="halaman_pegawai.php"
            </script>
        ';
        return false;
    } 
    
    // cek konfirmasi password
    if ($newPassword != $repeatNewPassword) {
        echo '
            <script>
                alert("Konfirmasi password tidak sesuai!");
                window.location.href="halaman_pegawai.php"
            </script>
        ';
        return false;
    } 
    
    if (password($_POST) > 0) {
        echo '
            <script>
                alert("Berhasil ganti password!");
                window.location.href="halaman_pegawai.php"
            </script>
        ';
    } else {
        echo '
            <script>
                alert("Gagal ganti password!");
                window.location.href="halaman_pegawai.php"
            </script>
        ';
    }
}

?>


    <?php include 'nav_pegawai.php'; ?>

    <!-- awal main -->
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
        <div
            class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">

            <h2>Ubah Password</b></h2><br>

        </div><br>

        <form action="" method="POST">
            <input type="hidden" name="id" value="<?= $usr['id']?> ">
            <div class="form-group row">
                <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                <div class="col-3">
                    <input type="text" class="form-control text-capitalize" name="nama" id="nama" value="<?= $usr['nama']; ?> " disabled>
                </div>
            </div>
            <div class="form-group row">
                <label for="noHp" class="col-sm-2 col-form-label">Nomor Hp</label>
                <div class="col-3">
                    <input type="text" class="form-control" name="noHp" id="noHp" value="<?= $usr['no_hp']; ?>" disabled>
                </div>
            </div>
            <div class="form-group row">
                <label for="old_password" class="col-sm-2 col-form-label">Password Lama</label>
                <div class="col-3">
                    <input type="password" class="form-control" name="old_password" id="old_password"
                        value="">
                </div>
            </div>
            <div class="form-group row">
                <label for="new_password" class="col-sm-2 col-form-label">Password Baru</label>
                <div class="col-3">
                    <input type="password" class="form-control" name="new_password" id="new_password"
                        value="">
                </div>
            </div>
            <div class="form-group row">
                <label for="repeat_new_password" class="col-sm-2 col-form-label">Konfirmasi Password</label>
                <div class="col-3">
                    <input type="password" class="form-control" name="repeat_new_password" id="repeat_new_password"
                        value="">
                </div>
            </div>
            

            <div class="form-group row">
            <div class="col-2"> </div>
            <div class="col-3">
                <button type="submit" name="update" class="btn btn-primary btn-block">Ubah Password</button>
                </div>
            </div>

        </form>

    </main>
    <!-- akhir main -->
    <!-- js -->

    </script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
    <script src="../js/bootstrap.bundle.min.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>




    <!-- /js -->
    </body>

</html>