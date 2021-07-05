<?php
//koneksi database
include_once ('../function.php');

session_start();
# cek apakah yang mengakses halaman ini sudah login sebagai pegawai
if(!isset($_SESSION['admin'])){
		header("location:../index.php?pesan=level");
    }

//apakah tombol submit sudah ditekan apa belum
if (isset($_POST["submit"])) {
    
    //cek keberhasilan insert
    if (tambah ($_POST)>0) {
        echo "

        <script>
            alert('data berhasil ditambahkan');
            document.location.href = 'user.php'; 
        </script>";
    }else {
        echo "
        <script >
            alert('data gagal ditambahkan');
            document.location.href = 'user.php';
        </script>";
    }

}
if (isset($_POST["cancel"])) {
    
    echo"
    <script>
        document.location.href = '../../sistem pertanian/user/user.php';
    </script>
    ";
}
?>


<!doctype html>
<html lang="en">

<head>
    <!-- requiredd meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/registrasi.css">
    <link rel="shortcut icon" href="../img/logo.png" type="image/x-icon">
    <title>Sistem Pertanian</title>
</head>

<body>
    <!--awal Register-->
    <div class="container">
        <div class="judul">
            <h1>Pendaftaran Pengguna</h1>
        </div>

        <!-- awal form registrasi-->
        <form  action="" method="POST">
            <div class="form-group row">
                <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                <div class="col-sm-10">
                    <input type="text" name="nama" class="form-control" id="nama" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="no_hp" class="col-sm-2 col-form-label">No. Hp</label>
                <div class="col-sm-10">
                    <input type="text" name="no_hp" class="form-control" id="no_hp" required>

                </div>
            </div>
            <div class="form-group row md-outline input-with-post-icon datepicker">
                <label for="tgl_lahir" class="col-sm-2 col-form-label">Tanggal Lahir</label>
                <div class="col-sm-10">
                    <input type="date" name="tgl_lahir" class="form-control tanggal-lahir" id="tgl_lahir" required>

                </div>
            </div>
            <div class="form-group row">
                <label for="bidang" class="col-sm-2 col-form-label">Bidang</label>
                <div class="col-sm-10">
                    <input type="text" name="bidang" class="form-control" id="bidang" required>

                </div>
            </div>
            <div class="form-group row">
                <label for="email" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                    <input type="email" name="email" class="form-control" id="email" required>

                </div>
            </div>
            <div class="form-group row">
                <label for="username" class="col-sm-2 col-form-label">Username</label>
                <div class="col-sm-10">
                    <input type="text" name="username" class="form-control" id="username" required>

                </div>
            </div>
            <div class="form-group row">
                <label for="password" class="col-sm-2 col-form-label">Password</label>
                <div class="col-sm-10">
                    <input type="password" name="password" class="form-control" id="password" required>

                </div>
            </div>
            <div class="row">
                <label for="level" class="col-form-label col-sm-2 pt-0">Pengguna sebagai</label>
                <div class="col-sm-10">
                    <select class="form-control custom-select browser-default" id="level" name="level" value="level"
                        required>
                        <option selected disabled value="">Level User</option>
                        <option value="admin">Admin</option>
                        <option value="pegawai">Pegawai</option>
                    </select>

                </div>
            </div><br>
            <div class="form-group row">
                <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                <div class="col-sm-10">
                    <input type="text" name="alamat" class="form-control " id="alamat" required>
                </div>
            </div>
            <div class="text-center">
                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                <a href="user.php">
                <button type="button" name="cancel" class="btn btn-primary">Cencel</button>
                </a>
            </div>
            
        </form>
        <!-- akhir form registrasi-->
    </div>
    <!--akhir register-->

    <!-- Optional JavaScript -->
    
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
        integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV"
        crossorigin="anonymous"></script>


</body>

</html>