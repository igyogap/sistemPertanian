<?php 
  include_once '../function.php';
	session_start();

	# cek apakah yang mengakses halaman ini sudah login sebagai pegawai
	if(!isset($_SESSION['pegawai'])){
		header("location:../index.php?pesan=level");
    }

  ?>

  <?php include 'nav_pegawai.php'; ?>

      <!-- awal main menu -->
      <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">

        <div
          class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
      <?php 
      $uname = $_SESSION["username"];
      $sql = mysqli_query($con, "SELECT * FROM tb_login WHERE username = '$uname'");
      while ($data = mysqli_fetch_array($sql)) {
        
      ?>
      <h2 class="text-capitalize">Selamat Datang Di Sistem Pertanian <b> <?= $data['nama']; ?></b>  </h2><br>
        </div><br>

            <!-- Awal Biodata -->
    <div class="shadow p-3 mb-5 bg-white rounded" style="padding-top : 20px">
      <div class="">
        <h2><b>Biodata</b></h2><hr>
      </div>
      <div class="row p-2">
        <div class="col-2">Nama</div>
        <div class="col text-capitalize">:
          <?= $data['nama']; ?>
        </div>
      </div>
      <div class="row p-2">
        <div class="col-2">Nomor hp</div>
        <div class="col">:
          <?= $data['no_hp']; ?>
        </div>
      </div>
      <div class="row p-2">
        <div class="col-2">Tanggal lahir</div>
        <div class="col">:
          <?= date('d F Y', strtotime($data['tgl_lahir'])); ?>
        </div>
      </div>
      <div class="row p-2">
        <div class="col-2 ">Bidang</div>
        <div class="col text-capitalize">:
          <?= $data['bidang']; ?>
        </div>
      </div>
      <div class="row p-2">
        <div class="col-2">Email</div>
        <div class="col">:
          <?= $data['email']; ?>
        </div>
      </div>
      <div class="row p-2">
        <div class="col-2 text-capitalize">Alamat</div>
        <div class="col">:
          <?= $data['alamat']; ?>
        </div>
      </div>
      <div class="row p-2">
        <div class="col-2"><a href="ubah_password_pegawai.php?id=<?= $data["id"] ?>">Ubah Password</a></div>
      </div>
    </div>
    <?php } ?>
    <!-- Akhir Biodata -->

        <!-- grafik -->

      <div class="row">
      <div class="col-12">

        <div class="card">
        <div class="card-header"><h5>Grafik Panen Padi</h5> </div>
        <div class=""><iframe src="../grafik/grafik_padi.php" width="100%" height="400" frameborder="0"></iframe></div>
        </div><br><br>

        <div class="card">
        <div class="card-header"><h5>Grafik Panen Palawija</h5></div>
        <div class=""><iframe src="../grafik/grafik_palawija.php" width="100%" height="400" frameborder="0"></iframe></div>
        </div><br><br>

        <div class="card">
        <div class="card-header"><h5>Grafik Panen SBS</h5></div>
        <div class=""><iframe src="../grafik/grafik_sbs.php" width="100%" height="400" frameborder="0"></iframe></div>
        </div>


      </div>
      </div>

    <!-- akhir Grafik -->

      </main>
      <!-- akhir main -->
      <!-- js -->

      <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
      <script src="../js/bootstrap.bundle.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.9.0/feather.min.js"></script>
      <!-- /js -->
</body>

</html>