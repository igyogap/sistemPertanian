<?php
//koneksi database
include_once '../function.php';

session_start();
# cek apakah yang mengakses halaman ini sudah login sebagai pegawai
    if(!isset($_SESSION['admin'])){
		header("location:../index.php?pesan=level");
    }

//ambil data di URL
$id = $_GET["id"];

// query data user

$usr = query("SELECT * FROM tb_login WHERE id = $id")[0];

//apakah tombol submit sudah ditekan apa belum
if (isset($_POST["submit"])) {
    
    //cek keberhasilan ubah
    if (ubah ($_POST)>0) {
        echo "
        <script>
        alert ('data berhasil diubah');
        document.location.href= 'user.php';
        </script>";
    }else {
        echo "
        <script >
        alert ('data gagal diubah');
        document.location.href= 'user.php';
        </script>";
    }
}
if (isset($_POST["cancel"])) {
    
    echo"
    <script>
        document.location.href = '../user/user.php';
    </script>
    ";
}
?>


<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="shortcut icon" href="../img/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/registrasi.css">
    
    <title>Sistem Pertanian</title>
</head>

<body>
    <!--awal Register-->
    <div class="container">

        <div class="judul">
            <h1>Update Data Pengguna</h1>
        </div>

<!-- awal form registrasi-->
        <form class="needs-validation" action="" method="POST" novalidate>
                    <input type="hidden" name="id" value="<?= $usr["id"];?>">
            <div class="form-group row">
                <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                <div class="col-sm-10">
                    <input type="text" name="nama" class="form-control" id="nama" value="<?= $usr["nama"] ?>"  required>
                    <div class="invalid-feedback">
                        Masukan nama anda
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <label for="no_hp" class="col-sm-2 col-form-label">No. Hp</label>
                <div class="col-sm-10">
                    <input type="text" name="no_hp" class="form-control" id="no_hp" value="<?= $usr["no_hp"] ?>" required>
                    <div class="invalid-feedback">
                        Masukan nomor handphone anda
                    </div>
                </div>
            </div>
            <div class="form-group row md-outline input-with-post-icon datepicker">
                <label for="tgl_lahir" class="col-sm-2 col-form-label">Tanggal Lahir</label>
                <div class="col-sm-10">
                    <input type="date" name="tgl_lahir" class="form-control tanggal-lahir" id="tgl_lahir" value="<?= $usr["tgl_lahir"] ?>" required>
                    <div class="invalid-feedback">
                        Masukan tanggal lahir anda
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <label for="bidang" class="col-sm-2 col-form-label">Bidang</label>
                <div class="col-sm-10">
                    <input type="text" name="bidang" class="form-control" id="bidang" value="<?= $usr["bidang"] ?>" required>
                    <div class="invalid-feedback">
                        Masukan bidang anda
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <label for="email" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                    <input type="email" name="email" class="form-control" id="email" value="<?= $usr["email"] ?>" required>
                    <div class="invalid-feedback">
                        Masukan email anda
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <label for="username" class="col-sm-2 col-form-label">Username</label>
                <div class="col-sm-10">
                    <input type="text" name="username" class="form-control" id="username" value="<?= $usr["username"] ?>" required>
                    <div class="invalid-feedback">
                        Masukan username anda
                    </div>
                </div>
            </div>
            <div class="row">
                <label for="level" class="col-form-label col-sm-2 pt-0">Pengguna sebagai</label>
                <div class="col-sm-10">
                <?php $result = mysqli_query($con, "SELECT * FROM tb_login WHERE id='$id'");
                if (mysqli_num_rows($result) === 1) {
                $row = mysqli_fetch_assoc($result);
                $level = $row['level'];
                }
                ?>
                    <select class="form-control custom-select browser-default" id="level" name="level"  required>
                        <option selected disabled value="">Level User</option>
                        <option <?php if($level == "admin") echo "selected";?>>admin</option>
                        <option <?php if($level == "pegawai") echo "selected";?>>pegawai</option>
                    </select>
                    <div class="invalid-feedback">
                        Pilih salah satu level pengguna sistem ini
                    </div>
                </div>
            </div><br>
            <div class="form-group row">
                <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                <div class="col-sm-10">
                    <input type="text" name="alamat" class="form-control " id="alamat" value="<?= $usr["alamat"] ?>" required>
                    <div class="invalid-feedback">
                        Masukan alamat anda
                    </div>
                </div>
            </div>
            <div class="tombol">
                <button type="submit" name="submit" class="btn btn-primary">Update</button>
                <button type="botton" name="cancel" class="btn btn-primary">Cencel</button>
            </div>
        </form>
        <!-- akhir form registrasi-->
    </div>
    <!--akhir register-->

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

        
</body>

</html>