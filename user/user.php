<?php

include_once ('../function.php');

$user = query("SELECT * FROM tb_login");

session_start();
# cek apakah yang mengakses halaman ini sudah login sebagai pegawai
    if(!isset($_SESSION['admin'])){
		header("location:../index.php?pesan=level");
    }

if (isset($_POST["cari"])) {
    $user = cari($_POST["keyword"]);
}


 include 'nav_admin.php'; ?>

    <!-- awal main menu -->
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
        <div
            class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">

            <h2>Data Pengguna</h2>

        </div>



        <div class="container">

            <div class="row justify-content-end">
                <form action="" method="post" style="margin : 15px">
                    <div class="input-group mb-3 ">
                        <input type="text" class="form-control" name="keyword" id="keyword" placeholder="Search..."
                            aria-label="search..." size="30" autofocus autocomplate="off">
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="submit" name="cari" id="tombol-cari">
                                <span class="fa fa-search"></span>
                            </button>
                        </div>
                    </div>
                </form>
            </div>

            <div id="container">
                <table class="table table-bordered">
                    <thead class="thead-dark">
                        <tr>

                            <th scope="col" class="text-center">No</th>
                            <th scope="col" class="text-center" style="width:200px;">Nama</th>
                            <th scope="col" class="text-center" style="width:200px;">Username</th>
                            <th scope="col" class="text-center">No. Hp</th>
                            <th scope="col" class="text-center">Email</th>
                            <th scope="col" class="text-center">Alamat</th>
                            <th scope="col" class="text-center" style="width:60px;">Aksi</th>

                        </tr>
                    </thead>

                    <tbody>

                        <?php $i=1;?>
                        <?php foreach ($user as $row): ?>
                        <tr>
                            <td class="text-center"><?= $i; ?></td>
                            <td class="text-center"><?= $row ["nama"]; ?></td>
                            <td class="text-center"><?= $row["username"]; ?></td>
                            <td class="text-center"><?= $row ["no_hp"]; ?></td>
                            <td class="text-center"><?= $row ["email"]; ?></td>
                            <td><?= $row["alamat"]; ?></td>
                            <td class="text-center" style="width: 78px;">
                                <a href="ubah.php?id=<?= $row["id"] ?>"">
                            <span class=" fa fa-pencil-square-o"></span>
                                </a>
                                <a href="hapus.php?id=<?= $row["id"] ?>"
                                    onclick="return confirm('Apakah anda yakin ingin menghapus data user?')">
                                    <span class="fa fa-user-times"></span>
                                </a>
                            </td>
                        </tr>
                        <?php $i++; ?>
                        <?php endforeach; ?>

                    </tbody>
                </table>
            </div>
            <div class="text-center">
                <a href="registrasi.php">
                    <button type="submit" name="submit" class="btn btn-primary">Tambah Pengguna
                        <span class="fa fa-user-plus"></span>
                    </button>
                </a>
            </div>
        </div>

    </main>
    <!-- akhir main -->


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>

    <script src="../js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.9.0/feather.min.js"></script>
    <script src="../js/script.js"></script>
    </body>

</html>